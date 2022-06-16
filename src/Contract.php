<?php 
namespace Vladcizsol\Energy;

class Contract
{
    public function getData(): array
    {
        return [
			'first_name' => 'Hans',
			'last_name' => 'Mayer',
			'date_of_birth' => '1980-05-05',
			'street' => 'Augsburger Str.',
			'house_number' => '4',
			'zip_code' => '10789',
			'city' => 'Berlin',
			'country' => 'Germany',
			'vat' => '19.00',
			'down_payment_interval' => 12,
			'yearly_usage' => '3500',
			'products' => [
				[
			        'name' => 'Electricity Simple',
			        'validFrom' => '2021-01-01',
			        'validUntil' => '2022-12-31',
			        'tariffs' => [
			            [
			                'name' => 'Tariff 1',
			                'usageFrom' => '0',
			                'validFrom' => '2021-01-01',
			                'validUntil' => '2021-12-31',
			                'workingPriceNet' => '0.20',
			                'basePriceNet' => '50.00'
			            ],
			            [
			                'name' => 'Tariff 2',
			                'usageFrom' => '0',
			                'validFrom' => '2022-01-01',
			                'validUntil' => '2022-12-31',
			                'workingPriceNet' => '0.20',
			                'basePriceNet' => '50.00'
			            ],
			            [
			                'name' => 'Tariff 3',
			                'usageFrom' => '3001',
			                'validFrom' => '2022-01-01',
			                'validUntil' => '2022-12-31',
			                'workingPriceNet' => '0.15',
			                'basePriceNet' => '40.00'
			            ],
			            [
			                'name' => 'Tariff 4',
			                'usageFrom' => '5001',
			                'validFrom' => '2022-01-01',
			                'validUntil' => '2022-12-31',
			                'workingPriceNet' => '0.12',
			                'basePriceNet' => '35.00'
			            ]
			        ]
			    ]
		    ],
		    'bonuses' =>  [  
			    [
			        'name' => 'BONUS-A',
			        'usageFrom' => 0,
			        'validFrom' => '2021-01-01',
			        'validUntil' => '2022-12-31',
			        'value' => '5',
			        'paymentAfterMonths' => 0
			    ],
			    [
			        'name' => 'BONUS-B',
			        'usageFrom' => 0,
			        'validFrom' => '2021-01-01',
			        'validUntil' => '2022-12-31',
			        'value' => '5',
			        'paymentAfterMonths' => 6
			    ],
			    [
			        'name' => 'BONUS-C',
			        'usageFrom' => 2500,
			        'validFrom' => '2021-01-01',
			        'validUntil' => '2022-12-31',
			        'value' => '2.5',
			        'paymentAfterMonths' => 3
			    ],
			    [
			        'name' => 'BONUS-D',
			        'usageFrom' => 4500,
			        'validFrom' => '2021-01-01',
			        'validUntil' => '2022-12-31',
			        'value' => '1.25',
			        'paymentAfterMonths' => 9
			    ]
			]
        ];
    }



}