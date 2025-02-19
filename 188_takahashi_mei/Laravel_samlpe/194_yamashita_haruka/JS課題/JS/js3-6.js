var man ='男性';
var woman = '女性';
var m_age = 25;
var w_age = 22;
var m_name = '田中';
var w_name = '鈴木';

//課題1
if(man === '男性'){
  console.log(m_name + 'は' + m_age + 'の' + man + 'です。');
}else{
  console.log(w_name + 'は' + w_age + 'の' + woman + 'です');
}

//課題2
if(m_age >= w_age){
  console.log(m_name + 'は' + w_name  + 'より年上です。');
}else{
  console.log(m_name + 'は' + w_name  + 'より年下です。');

}