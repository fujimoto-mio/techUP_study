'use strict';
class Triple{
    static customName = 'Tripler';
    static description = 'I triple any number you provide';

    static calculate(n = 1){
        return n * 3;
    }
}

class SquaredTriple extends Triple{
    static longDescription;
    static description = 'I square the triple of any number you provide';
    static calculate(n) {
        return super.calculate(n) * super.calculate(n);
    }
}

console.log(Triple.description);
console.log(Triple.calculate(6));

const tp = new Triple();
console.log(SquaredTriple.calculate(3));
console.log(SquaredTriple.customName);

console.log(tp.calculate());