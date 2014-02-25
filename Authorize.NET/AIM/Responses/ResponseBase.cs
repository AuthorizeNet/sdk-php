using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace AuthorizeNet {
    public abstract class ResponseBase {
        public string[] RawResponse;

        internal Dictionary<int, string> APIResponseKeys {
            get {
                return new Dictionary<int, string>();
            }
        }

        internal int ParseInt(int index) {
            int result = 0;
            if (RawResponse.Length > index)
                int.TryParse(RawResponse[index].ToString(), out result);
            return result;
        }

        internal decimal ParseDecimal(int index) {
            decimal result = 0;
            if (RawResponse.Length > index)
                decimal.TryParse(RawResponse[index].ToString(), out result);
            return result;
        }

        internal string ParseResponse(int index) {
            var result = "";
            if (RawResponse.Length > index) {
                result = RawResponse[index].ToString();
            }
            return result;
        }
        public int FindByValue(string val) {
            int result = 0;
            for (int i = 0; i < RawResponse.Length; i++) {
                if (RawResponse[i].ToString() == val) {
                    result = i;
                    break;
                }
            }
            return result;
        }
        public override string ToString() {
            StringBuilder sb = new StringBuilder();
            int index = 0;
            foreach (var key in APIResponseKeys.Keys) {
                sb.AppendFormat("{0} = {1}\n", APIResponseKeys[key], ParseResponse(index));
                index++;
            }
            return sb.ToString();
        }

    }
}
