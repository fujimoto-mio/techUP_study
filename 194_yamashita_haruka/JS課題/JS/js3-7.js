let zodiac = ["子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥"];
let Tiger = ""; 

for (let i = 0; i < zodiac.length; i++) {
  if(zodiac[i] === '寅'){
    Tiger = zodiac[i];
    break;       // 寅を見つけたらループを抜ける
}
}
console.log(Tiger);
