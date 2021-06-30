<?php 

Class Functions 
{     
    /**
     * array
     *
     * @var array
     */
    private $array = [
        [
            'id' => 1,
            'prices' => '100'
        ],
        [
            'id' => 2,
            'prices' => '200'
        ],
        [
            'id' => 3,
            'prices' => '300'
        ]
    ];
    
    /**
     * filter function
     *
     * @return void
     */
    private function list()
    {
        $list = [];
        $price_filter = $_GET['price_filter'];
        $arrays = $this->array ?: [];

        foreach ($arrays as $array)
        {
            if (array_key_exists('prices', $array))
            {
                if ($array['prices'] > $price_filter)
                {
                    $list [] = $array;
                }
            }
        }
        
        return $list;
    }
    
    /**
     * return the list of the filter
     *
     * @return void
     */
    public function return_list()
    {
        $array = $this->list();
        $json = json_encode($array, JSON_PRETTY_PRINT);

        return $json;
    }
    
    /**
     * return the sum of the filter
     *
     * @return void
     */
    public function return_sum()
    {
        $array = $this->list();
        $sum = array_sum(array_column($array, 'prices'));

        return $sum;
    }
}