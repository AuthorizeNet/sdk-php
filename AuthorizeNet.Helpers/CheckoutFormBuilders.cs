using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Web.Mvc.Html;
using System.Web.Mvc;
using System.Web;

namespace AuthorizeNet.Helpers {

    /// <summary>
    /// A class that builds out a SIM-ready form for submission to Auth.net. This is an IDisposable class and
    /// is meant to be used with a Using block - which will open and close the form.
    /// </summary>
    public class SIMForm : IDisposable {
        HttpResponseBase _response;

        string _returnUrl;
        decimal _amount;
        string _apiLogin;
        string _transactionkey;
        bool _isTest;


        public SIMForm(HttpResponseBase response, string returnUrl, decimal amount, string apiLogin, string transactionKey)
                                :this(response,returnUrl,amount,apiLogin,transactionKey,true){}

        public SIMForm(HttpResponseBase response, string returnUrl, decimal amount, string apiLogin, string transactionKey, bool isTest) {
            _response = response;
            _amount = amount;
            _apiLogin = apiLogin;
            _transactionkey = transactionKey;
            _returnUrl = returnUrl;
            _isTest = isTest;
            OpenForm();
        }
        void OpenForm() {

            var seq = Crypto.GenerateSequence();
            var stamp = Crypto.GenerateTimestamp();

            var fingerPrint = Crypto.GenerateFingerprint(_transactionkey, 
                _apiLogin, _amount, seq.ToString(), stamp.ToString());
            
            var formAction = Gateway.LIVE_URL;

            //for testing
            if(_isTest)
                formAction = Gateway.TEST_URL;

            _response.Write("<form action = '"+formAction+"' method = 'post'>\n");
            _response.Write("\t\t<input type = 'hidden' name = 'x_fp_hash' value = '" + fingerPrint + "' \\>\n");
            _response.Write("\t\t<input type = 'hidden' name = 'x_fp_sequence' value = '" + seq + "'\\>\n");
            _response.Write("\t\t<input type = 'hidden' name = 'x_fp_timestamp' value = '" + stamp + "' \\>\n");
            _response.Write("\t\t<input type = 'hidden' name = 'x_login' value = '" + _apiLogin + "' \\>\n");
            _response.Write("\t\t<input type = 'hidden' name = 'x_amount' value = '" + _amount + "' \\>\n");
            _response.Write("\t\t<input type = 'hidden' name = 'x_relay_url' value = '" + _returnUrl + "' \\>\n");
            _response.Write("\t\t<input type = 'hidden' name = 'x_relay_response' value = 'TRUE' \\>\n");

        }

        void EndForm() {
            _response.Write("</form>");
        }

        
        public void Dispose() {
            EndForm();
        }
    }
    
    public static class CheckoutFormBuilders {

        /// <summary>
        /// Creates a SIM-ready form with the hidden inputs and submission URL ready to go.
        /// </summary>
        public static SIMForm BeginSIMForm(this HtmlHelper helper, string returnUrl, decimal amount, string apiLogin, string transactionKey) {
            return new SIMForm(helper.ViewContext.HttpContext.Response,returnUrl,amount,apiLogin,transactionKey,true);
        }
        public static SIMForm BeginSIMForm(this HtmlHelper helper, string returnUrl, decimal amount, string apiLogin, string transactionKey, bool isTest) {
            return new SIMForm(helper.ViewContext.HttpContext.Response, returnUrl, amount, apiLogin, transactionKey,isTest);
        }
        /// <summary>
        /// Outputs an input box specifically for a CreditCard, API-ready with proper naming for the SDK
        /// </summary>
		public static string CreditCardInput (this HtmlHelper helper)
		{
			return CreditCardInput(helper,false);
		}
        /// <summary>
        /// Outputs an input box specifically for a CreditCard, API-ready with proper naming for the SDK. If you mark it forTest, then
        /// a test number will be planted for you - 4111111111111
        /// </summary>
        public static string CreditCardInput(this HtmlHelper helper, bool forTest)
		{
			return "<input type = \"text\" size = \"36\" name = \"card_num\" value = \"4111111111111111\"/>";
		}
		
        /// <summary>
        /// A small textbox for inputing the secret codebox 
        /// </summary>
        public static string CCVInput (this HtmlHelper helper)
		{
			return "<input type = \"text\" size = \"5\" maxlength = \"5\" name = \"x_exp_date\" />";
		}

        /// <summary>
        /// A small textbox for inputing the expiration date 
        /// </summary>
        public static string CreditCardExpirationInput(this HtmlHelper helper)
		{
            return "<input type = \"text\" size = \"3\" maxlength = \"3\" name = \"x_card_code\" />";
		}

        /// <summary>
        /// Creates the inputs for credit card form submission: creditCard, expiration, and secret code.
        /// </summary>
        /// <param name="helper"></param>
        /// <returns></returns>
		public static string CheckoutFormInputs (this HtmlHelper helper)
		{
			return CheckoutFormInputs (helper, true);
		}
        /// <summary>
        /// Creates a credit card checkout input form (without form tag) that includes address. These inputs are named
        /// according to API guidelines and are ready for use with the FormReaders
        /// </summary>
		public static string CheckoutFormInputsWithAddress (this HtmlHelper helper, bool isTest)
		{
			var sb = new StringBuilder ();
			sb.Append (CheckoutFormInputs (helper, isTest));
			sb.AppendLine("<div style='height:24px'></div>");
			sb.Append (AddressForm ());
			return sb.ToString ();
		}
        /// <summary>
        /// Creates a credit card checkout input form (without form tag) that includes shipping address. These inputs are named
        /// according to API guidelines and are ready for use with the FormReaders
        /// </summary>		
		public static string CheckoutFormInputsWithShipping (this HtmlHelper helper, bool isTest)
		{
			var sb = new StringBuilder ();
			sb.Append (CheckoutFormInputs (helper, isTest));
			sb.AppendLine ("<div style='height:24px'></div>");
			sb.Append (ShippingForm ());
			return sb.ToString ();
		}

        /// <summary>
        /// Creates a credit card checkout input form (without form tag) that includes address and shipping address. These inputs are named
        /// according to API guidelines and are ready for use with the FormReaders
        /// </summary>
		public static string CheckoutFormInputsWithAddressAndShipping (this HtmlHelper helper, bool isTest)
		{
			var sb = new StringBuilder ();
			sb.Append (CheckoutFormInputs (helper, isTest));
			sb.AppendLine ("<div style='height:24px'></div>");
			sb.Append (AddressForm ());			
			sb.AppendLine ("<div style='height:24px'></div>");
			sb.Append (ShippingForm ());
			return sb.ToString ();
		}		
		

		public static string CheckoutFormInputs (this HtmlHelper helper, bool isTest)
		{
	
			return CreditCardForm(isTest);
		}

        /// <summary>
        /// Creates a CreditCard form which has names which are compliant with the CheckoutFormReaders using the Authorize.NET
        /// API for naming guidelines
        /// </summary>
		public static string CreditCardForm (bool isTest)
		{
			string inputs = "<h2>Payment Information</h2>";
			if (isTest) {
				inputs += @"
					<div style = 'border: 1px solid #990000; padding:12px; margin-bottom:24px; background-color:#ffffcc;width:300px'>Test Mode</div>
					<div style = 'float:left;width:250px;'>
						<label>Credit Card Number</label>
						<div id = 'CreditCardNumber'>
							<input type = 'text' size = '28' name = 'x_card_num' value = '4111111111111111' id = 'x_card_num'/>
						</div>
					</div>	
					<div style = 'float:left;width:70px;'>
						<label>Exp.</label>
						<div id = 'CreditCardExpiration'>
							<input type = 'text' size = '5' maxlength = '5' name = 'x_exp_date' value = '0116' id = 'x_exp_date'/>
						</div>
					</div>
					<div style = 'float:left;width:70px;'>
						<label>CCV</label>
						<div id = 'CCV'>
							<input type = 'text' size = '5' maxlength = '5' name = 'x_card_code' id = 'x_card_code' value = '123' />
						</div>
					</div>";
			} else {
				inputs += @"
					<div style = 'float:left;width:250px;'>
						<label>Credit Card Number</label>
						<div id = 'CreditCardNumber'>
							<input type = 'text' size = '28' name = 'x_card_num' id = 'x_card_num'/>
						</div>
					</div>	
					<div style = 'float:left;width:70px;'>
						<label>Exp.</label>
						<div id = 'CreditCardExpiration'>
							<input type = 'text' size = '5' maxlength = '5' name = 'x_exp_date' id = 'x_exp_date'/>
						</div>
					</div>
					<div style = 'float:left;width:70px;'>
						<label>CCV</label>
						<div id = 'CCV'>
							<input type = 'text' size = '5' maxlength = '5' name = 'x_card_code' id = 'x_card_code' />
						</div>
					</div>";
			}
			
			return inputs;
		}
		
		public static string AddressForm ()
		{
			
			var form = @"
				<h2>Address</h2>
				<div style='float:left;width:180px;padding-right:10px'>
				
					<label>First Name</label>
					<input type='text' size='18' name='x_first_name' id='x_first_name'/>
				</div>
				<div style='float:left;width:180px'>
				
					<label>Last Name</label>
					<input type='text' size='18' name='x_last_name' id='x_last_name'/>
				</div>	
				<div style='float:left;padding-right:8px'>
				
					<label>Address</label>
					<input type='text' size='42' name='x_address' id='x_address'/>
				</div>	
				<div style='float:left;'>
				
					<label>City</label>
					<input type='text' size='20' name='x_city' id='x_city'/>
				</div>	
				<div style='clear:both'></div>	
				<div style='float:left;;padding-right:8px'>
					<label>State</label>
					<input type='text' size='6' maxlength='2' name='x_state' id='x_state'/>
				</div>	
				<div style='float:left;padding-right:8px'>
					<label>Zip</label>
					<input type='text' size='10' maxlength='5' name='x_zip' id='x_zip'/>
				</div>	
				<div style='float:left;'>
					<label>Country</label>
					<input type='text' size='26' name='x_country' value='USA' id = 'x_country'/>
				</div>			
				<div style='clear:both'></div>	
				<div style='float:left;padding-right:8px'>
				
					<label>Email</label>
					<input type='text' size='42' name='x_email' id='x_email'/>
				</div>			
				<div style='clear:both'></div>";
			return form;
		}
		
		public static string ShippingForm ()
		{
			
			var form = @"
				<h2>Shipping</h2>
				<div style='float:left;width:180px;padding-right:10px'>
				
					<label> First Name</label>
					<input type='text' size='31' name='x_ship_to_first_name' id='x_ship_to_first_name'/>
				</div>
				<div style='float:left;width:180px'>
				
					<label>Last Name</label>
					<input type='text' size='31' name='x_ship_to_last_name' id='x_ship_to_last_name'/>
				</div>	
				<div style='float:left;padding-right:8px'>
				
					<label>Address</label>
					<input type='text' size='42' name='x_ship_to_address' id='x_ship_to_address'/>
				</div>	
				<div style='float:left;'>
				
					<label>City</label>
					<input type='text' size='20' name='x_ship_to_city' id='x_ship_to_city'/>
				</div>	
				<div style='clear:both'></div>	
				<div style='float:left;;padding-right:8px'>
					<label>State</label>
					<input type='text' size='6' maxlength='2' name='x_ship_to_state' id='x_ship_to_state'/>
				</div>	
				<div style='float:left;padding-right:8px'>
					<label>Zip</label>
					<input type='text' size='10' maxlength='5' name='x_ship_to_zip' id='x_ship_to_zip'/>
				</div>	
				<div style='float:left;'>
					<label>Country</label>
					<input type='text' size='30' name='x_ship_to_country' value='USA' id = 'x_ship_to_country'/>
				</div>						
				<div style='clear:both'></div>";
			return form;
		}

        /// <summary>
        /// This will issue a full HTML document with a built-in script, which will redirect the browser away from 
        /// Authorize.NET to the URL you pass in. Be sure the toURL is absolute.
        /// </summary>
        /// <param name="toUrl"></param>
        /// <returns></returns>
        public static string Redirecter(string toUrl) {
            return string.Format("<html><head><script type='text/javascript' charset='utf-8'>	window.location='{0}';</script><noscript><meta http-equiv='refresh' content='1;url={0}'></noscript></head><body></body></html>", toUrl);

        }

    }
}
