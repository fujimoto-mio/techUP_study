const items= [
  {input:["a","b","c"]},
{output:[{0: "a"}, {1: "b"}, {2: "c"}]}
]
const object = items.map( obj =>{
  return [obj.output]
});
console.log(object);
