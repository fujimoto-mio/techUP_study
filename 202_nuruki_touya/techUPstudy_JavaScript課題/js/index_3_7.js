let year = 2022; // 今年の年を設定
let eto = ""; // 干支を入れる変数

switch (year % 12) {
    case 0: eto = "申"; break;
    case 1: eto = "酉"; break;
    case 2: eto = "戌"; break;
    case 3: eto = "亥"; break;
    case 4: eto = "子"; break;
    case 5: eto = "丑"; break;
    case 6: eto = "寅"; break; 
    case 7: eto = "卯"; break;
    case 8: eto = "辰"; break;
    case 9: eto = "巳"; break;
    case 10: eto = "午"; break;
    case 11: eto = "未"; break;
    default: eto = "不明";
}

console.log( year + "年の干支は" + eto + "です！" );