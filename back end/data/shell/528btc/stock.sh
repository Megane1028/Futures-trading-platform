#!/bin/bash
int=1;
while(( int <= 600 ));
do 
    /www/server/php/72/bin/php /www/wwwroot/www.1.com/stock.php Btc528/runStock
    # /www/server/php/72/bin/php /www/wwwroot/wp.bkex.info/stock.php Bian/getUsdt
    let "int++";
    sleep 1;
done