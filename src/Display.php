<?php 
namespace Vladcizsol\Energy;
use Vladcizsol\Energy\Contract;
use Vladcizsol\Energy\Validator;
use Vladcizsol\Energy\Calculate;
class Display
{
    public function write()
    {

    	$contracts = new Contract();
    	$datas = $contracts->getData();
    	$validator = new Validator();
    	$validator->validate($datas);
    	$calculate = new Calculate();
    	$bestPrice = $calculate->bestPrice($datas);
    	$bonuses = $calculate->bonuses($datas);
    	$monthlyPayments = $calculate->monthlyPayments($datas, $bestPrice, $bonuses

    	);

        echo "Interval: " . $datas['down_payment_interval'] . "<br>";
        echo "First Name: {$datas['first_name']} \n";
        echo "Last Name: {$datas['last_name']} \n";
        echo "Product Name: {$bestPrice['productName']} \n";
        echo "Tariff Base price: {$bestPrice['basePriceNet']} EUR \n";
        echo "Tariff Working price: {$bestPrice['workingPriceNet']} Cent \n";
        foreach ($monthlyPayments['monthlyPayments'] as $month => $monthlyPayment) {
            echo "Monthly down payemnt: {$month} - {$monthlyPayment} EUR \n";
        }



    }



}