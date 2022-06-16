<?php 
namespace vladcizsol\Energy;

class Validator
{
    public function required($data)
    {
    	if (empty($data)) {
    		echo "is missing or invalid";
            exit();
    	}
    }

    public function date($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        $d->format($format) === $date;
        if (!$d) {
        	echo "has wrong format";
            exit();
        }
    }

    public function vat($data)
    {
    	if (empty($data) || !is_numeric($data) || (float)$data > 100 || (float)$data < 0) {
    		echo "has wrong format";
            exit();
    	}
    }
    
    public function downPaymentInterval($data) 
    {
    	if (empty($data) || !is_numeric($data) || (int)$data < 1) {
    		echo "is missing or invalid";
            exit();
    	}
    }

    public function yearlyUsage($data) 
    {
    	if (empty($data) || !is_numeric($data) || (int)$data < 0) {
    		echo "is missing or invalid";
            exit();
    	}
    }



    public function validate($datas) 
    {      
        $requiredInputs = array("first_name", "last_name", "date_of_birth", "street", "house_number", "zip_code", "city", "country", "vat",  "down_payment_interval",  "yearly_usage",  "products");
        $dateInputs = array("date_of_birth");
        $vatInputs = array("vat");
        $downPaymentIntervalInputs = array("down_payment_interval");
        $yearlyUsageInputs = array("yearly_usage");

        foreach ($datas as $key => $data) {
            if (in_array($key, $requiredInputs)) {
                $this->required($data);
            }
            if (in_array($key, $dateInputs)) {
                $this->date($data);
            }
            if (in_array($key, $vatInputs)) {
                $this->vat($data);
            }
            if (in_array($key, $downPaymentIntervalInputs)) {
                $this->downPaymentInterval($data);
            }
            if (in_array($key, $yearlyUsageInputs)) {
                $this->yearlyUsage($data);
            }
        }
    }


}