<script>
/*数値→文字列*/
    var test1,test2;
    var num = 123; //数値
    String(num); // "123"
    test1 = num.toString(10); // "123"　ちなみに10は、10進数の意味
    test2 = num.toFixed() // "123"
 
    console.log(test1);
    console.log(test2);
 
    var num = 123.45678;
    String(num); // "123.45678"
    test1 = num.toString(10); // "123.45678"
    test2 = num.toFixed() // "123"
 
    console.log(test1);
    console.log(test2);
    
    /*文字列→数値*/
    var str = '123.5';
    console.log(str);
 
    Number(str); // 123
    parseInt(str, 10); // 123
    parseFloat(str); // 123.5
 
    console.log(str / 2); // 
    console.log(str * 1.5); //
    
    /*NaN　数値として認識できなかった場合は「NaN（Not a Number）」へ変換します*/
    console.log( '10進数「abc」 = ' + parseInt('abc', 10) );  /* 数値でないので変換できない */
    </script>