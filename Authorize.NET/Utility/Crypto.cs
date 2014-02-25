using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Security.Cryptography;
using System.Text.RegularExpressions;

namespace AuthorizeNet {
    public class Crypto {
        /// <summary>
        /// Generates the HMAC-encrypted hash to send along with the SIM form
        /// </summary>
        /// <param name="transactionKey">The merchant's transaction key</param>
        /// <param name="login">The merchant's Authorize.NET API Login</param>
        /// <param name="amount">The amount of the transaction</param>
        /// <returns></returns>
        public static string GenerateFingerprint(string transactionKey, string login, decimal amount, string sequence, string timeStamp) {
            var result = "";
            var keyString = string.Format("{0}^{1}^{2}^{3}^", login, sequence, timeStamp.ToString(), amount.ToString());
            result = EncryptHMAC(transactionKey, keyString);
            return result;
        }

        /// <summary>
        /// Decrypts provided string parameter
        /// </summary>
        public static bool IsMatch(string key, string apiLogin, string transactionID,decimal amount, string expected) {

            var unencrypted = string.Format("{0}{1}{2}{3}", key, apiLogin, transactionID, amount.ToString());

            var md5 = new System.Security.Cryptography.MD5CryptoServiceProvider();
            var hashed = Regex.Replace(BitConverter.ToString(md5.ComputeHash(ASCIIEncoding.Default.GetBytes(unencrypted))), "-", "");

            // And return it
            return hashed.Equals(expected);

        }

        /// <summary>
        /// Encrypts the key/value pair supplied using HMAC-MD5
        /// </summary>
        public static string EncryptHMAC(string key, string value) {
            // The first two lines take the input values and convert them from strings to Byte arrays
            byte[] HMACkey = (new System.Text.ASCIIEncoding()).GetBytes(key);
            byte[] HMACdata = (new System.Text.ASCIIEncoding()).GetBytes(value);

            // create a HMACMD5 object with the key set
            HMACMD5 myhmacMD5 = new HMACMD5(HMACkey);

            //calculate the hash (returns a byte array)
            byte[] HMAChash = myhmacMD5.ComputeHash(HMACdata);

            //loop through the byte array and add append each piece to a string to obtain a hash string
            string fingerprint = "";
            for (int i = 0; i < HMAChash.Length; i++) {
                fingerprint += HMAChash[i].ToString("x").PadLeft(2, '0');
            }

            return fingerprint;
        }

        /// <summary>
        /// Generates a 4-place sequence number randomly
        /// </summary>
        /// <returns></returns>
        public static string GenerateSequence() {
            Random random = new Random();
            return (random.Next(0, 1000)).ToString();

        }

        /// <summary>
        /// Generates a timestamp in seconds from 1970
        /// </summary>
        public static int GenerateTimestamp() {
            return ((int)(DateTime.UtcNow - new DateTime(1970, 1, 1)).TotalSeconds);
        }
    }
}
