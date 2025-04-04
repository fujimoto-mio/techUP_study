class Who {
    static description = "This is Who class";
    static getInfo() {
        return "Who class provides personal information";
    }

    constructor(name) {
        this.name = name;
    }
}

console.log(Who)

//課題①：クラスの静的プロパティ・メソッドの確認
console.log(Who.description); 
console.log(Who.getInfo()); 

// 課題②
Who.prototype.getName = function() {
    return "classのようなもの";
};

const person = new Who("tanaka");
console.log(person.name); 
console.log(person.getName());
