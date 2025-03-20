const array = ['read1', 'read2', 'read3', 'read4', 'read5'];

const newArray = [
  'write_red',
  'write_blue',
  'write_yellow',
  ...array.slice(3)
];

console.log(newArray);