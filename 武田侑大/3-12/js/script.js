const arrAY = ["redd","redd2","redd3","redd4","redd5"]

const newarray = function (arrAY){
 arrAY.splice(0,3,"write_red", "write_blue", "write_yellow");
 return arrAY;

};
console.log(newarray(arrAY));
