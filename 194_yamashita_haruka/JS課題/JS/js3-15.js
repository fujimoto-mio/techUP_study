//1.コンストラクタであるWhoを定義,インスタンスプロパティnameに引数nameを設定
class Who {
  constructor(name) {
    this.name = name;
  }
}

// プロトタイプにgetNameメソッドを追加,インスタンスプロパティのnameを返す関数記述
Who.prototype.getName = function() {
  return this.name;
};

//コンストラクタを使用して新しいインスタンスWhoを作成
const person = new Who('tanaka');
console.log(person.getName()); // 出力: tanaka


//こっちの方が作りやすい
/*class Who {
  constructor(name) {
    this.name = name;
  }

  getName() {
    return this.name;
  }
}

const person = new Who('tanaka');
console.log(person.getName()); // 出力: tanaka*/





/*Level3-15のメソッドのところの記述方法
  Who.prototype.getName: function() {
    return this.name;
  };*/

/*クラス内部に直接メソッドを定義する方法ES6以降
  getName() {
    return this.name;
  }*/

