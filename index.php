<?php

    class parserClass
    {
        /**
         *
         */
        public function testParser()
        {
            $xml = simplexml_load_string(file_get_contents('https://stylecaster.com/feeds/amazon'));

            if (!empty($xml->channel)) {
                foreach ($xml->channel->item as $items) { //Получение массива от <channel>

                  echo $items->{'link'}. '<br />';
                  $content = $items->children('amzn', true);
                  echo '--' . $content->{'introText'} . '<br />';

                    if (isset($content->products[0])) {
                        foreach ($content->products[0] as $product) { //Проходим цыклом по []-product
                            // и выводим нужные поля
                            echo '[-]' . $product->{'productURL'}. '<br />';
                            echo '[--]' . $product->{'productHeadline'}. '<br />';
                            echo '[---]' . $product->{'productSummary'}. '<br />';
                            echo '[----]' . $product->{'award'}. '<br />';

                        }
                    }
                }
            }
        }

    }

    $result = new parserClass();
    $result->testParser();