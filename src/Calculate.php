<?php 
namespace Vladcizsol\Energy;
use Vladcizsol\Energy\Contract;
use Vladcizsol\Energy\Validator;
class Calculate
{
    public function bestPrice($datas)
    {
        $now = new \DateTime('now');
        $contract = array();
        foreach ($datas['products'] as $product) {
            if ($now >= new \DateTime($product['validFrom']) && $now <= new \DateTime($product['validUntil'])) {
                $contract['productName'] = $product['name'];
                foreach ($product['tariffs'] as $tariff) {
                    if ($now >= new \DateTime($tariff['validFrom']) && $now <= new \DateTime($tariff['validUntil'])
                        && $datas['yearly_usage'] >= $tariff['usageFrom']) {
                        $contract['tariff'] = $tariff;
                        $contract['workingPriceNet'] = $tariff['workingPriceNet'];
                        $contract['basePriceNet'] = $tariff['basePriceNet'];
                    }
                }

                return $contract;
            }
        }
    }

    public function bonuses($datas)
    {
        $now = new \DateTime('now');
        $bonuses = array();
        foreach ($datas['bonuses'] as $bonus) {
            if ($now >= new \DateTime($bonus['validFrom']) && $now <= new \DateTime($bonus['validUntil'])
                && $datas['yearly_usage'] >= $bonus['usageFrom']) {
                $bonuses[] = $bonus;
            }
        }  
        return $bonuses;      
    }

    public function monthlyPayments($datas, $bestPrice, $bonuses)
    {
        // yearly working price
        $monthlyPayments['workingPriceNetYearly'] = $workingPriceNetYearly =
            $bestPrice['workingPriceNet'] * $datas['yearly_usage'];

        // calculate monthly down payment for the contract
        $monthlyPayments['monthlyDownPayment'] = ($bestPrice['basePriceNet'] +
                $monthlyPayments['workingPriceNetYearly']) / (int)$datas['down_payment_interval'];

        $monthlyPayments['monthlyPayments'] = [];
        for ($i = 1; $i <= (int)$datas['down_payment_interval']; $i++) {
            $mPayment = $monthlyPayments['monthlyDownPayment'];
            foreach ($bonuses as $bonus) {
                if ($i > $bonus['paymentAfterMonths']) {
                    // add here the bonus on the staring monthly down payment, not the resulted
                    $mPayment -= ($monthlyPayments['monthlyDownPayment'] * ((float)$bonus['value'] / 100));
                }
            }
            $monthlyPayments['monthlyPayments'][$i] = round($mPayment + ($mPayment * ($datas['vat'] / 100)), 2);
        }   

        return $monthlyPayments;
    }


}