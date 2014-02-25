using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using AuthorizeNet.APICore;

namespace AuthorizeNet {

    /// <summary>
    /// A helper class for representing a charge
    /// </summary>
    public class Charge {
        /// <summary>
        /// Creates a List of Charges from the Statistics return from the batch.
        /// </summary>
        /// <param name="stats">The stats.</param>
        /// <returns></returns>
        public static List<Charge> NewFromStat(batchStatisticType[] stats){
            var result = new List<Charge>();
            if (stats != null) {
                for (int i = 0; i < stats.Length; i++) {
                    var stat = stats[i];
                    result.Add(new Charge {
                        Amount = stat.chargeAmount,
                        CardType = stat.accountType,
                        ChargeBackAmount = stat.chargebackAmount,
                        ChargeBackCount = stat.chargebackCount,
                        CorrectionNoticeCount = stat.correctionNoticeCount,
                        DeclineCount = stat.declineCount,
                        RefundAmount = stat.refundAmount,
                        ReturnedItemsAmount = stat.refundReturnedItemsAmount,
                        ReturnedItemsCount = stat.refundReturnedItemsCount,
                        VoidCount = stat.voidCount
                    });
                }
            }
            return result;
        }

        /// <summary>
        /// Gets or sets the type of the card.
        /// </summary>
        /// <value>The type of the card.</value>
        public string CardType { get; set; }
        /// <summary>
        /// Gets or sets the amount.
        /// </summary>
        /// <value>The amount.</value>
        public decimal Amount { get; set; }
        /// <summary>
        /// Gets or sets the charge back amount.
        /// </summary>
        /// <value>The charge back amount.</value>
        public decimal ChargeBackAmount { get; set; }
        /// <summary>
        /// Gets or sets the charge back count.
        /// </summary>
        /// <value>The charge back count.</value>
        public decimal ChargeBackCount { get; set; }
        /// <summary>
        /// Gets or sets the returned items count.
        /// </summary>
        /// <value>The returned items count.</value>
        public int ReturnedItemsCount { get; set; }
        /// <summary>
        /// Gets or sets the returned items amount.
        /// </summary>
        /// <value>The returned items amount.</value>
        public decimal ReturnedItemsAmount { get; set; }
        /// <summary>
        /// Gets or sets the correction notice count.
        /// </summary>
        /// <value>The correction notice count.</value>
        public int CorrectionNoticeCount { get; set; }
        /// <summary>
        /// Gets or sets the decline count.
        /// </summary>
        /// <value>The decline count.</value>
        public int DeclineCount { get; set; }
        /// <summary>
        /// Gets or sets the refund amount.
        /// </summary>
        /// <value>The refund amount.</value>
        public decimal RefundAmount { get; set; }
        /// <summary>
        /// Gets or sets the void count.
        /// </summary>
        /// <value>The void count.</value>
        public int VoidCount { get; set; }
    }

    /// <summary>
    /// A class representing a batch-settlement
    /// </summary>
    public class Batch {


        /// <summary>
        /// Creates a new batch from a stats response
        /// </summary>
        public static Batch NewFromResponse(getBatchStatisticsResponse batch) {
            return new Batch {
                ID = batch.batchDetails.batchId,
                PaymentMethod = batch.batchDetails.paymentMethod,
                SettledOn = batch.batchDetails.settlementTimeUTC,
                State = batch.batchDetails.settlementState,
                Charges = Charge.NewFromStat(batch.batchDetails.statistics)
            };
        }

        /// <summary>
        /// Creates a list of batches directly from the API Response
        /// </summary>
        /// <param name="batches">The batches.</param>
        /// <returns></returns>
        public static List<Batch> NewFromResponse(getSettledBatchListResponse batches){
            var result = new List<Batch>();
            if (null != batches && null != batches.batchList)
            {
                for (int i = 0; i < batches.batchList.Length; i++)
                {
                    var item = batches.batchList[i];

                    result.Add(new Batch
                    {
                        Charges = Charge.NewFromStat(item.statistics),
                        ID = item.batchId,
                        PaymentMethod = item.paymentMethod,
                        SettledOn = item.settlementTimeUTC,
                        State = item.settlementState
                    });
                }
            }

            return result;
        }
        /// <summary>
        /// Gets or sets the charges.
        /// </summary>
        /// <value>The charges.</value>
        public List<Charge> Charges { get; set; }
        /// <summary>
        /// Gets or sets the ID.
        /// </summary>
        /// <value>The ID.</value>
        public string ID { get; set; }
        /// <summary>
        /// Gets or sets the settled on.
        /// </summary>
        /// <value>The settled on.</value>
        public DateTime SettledOn { get; set; }
        /// <summary>
        /// Gets or sets the state.
        /// </summary>
        /// <value>The state.</value>
        public string State { get; set; }
        /// <summary>
        /// Gets or sets the payment method.
        /// </summary>
        /// <value>The payment method.</value>
        public string PaymentMethod { get; set; }
    }
}
