const start = Date.now();

console.log('starting timer...');
// Expected output: "starting timer..."

setTimeout(() => {
  const millis = Date.now() - start;

  console.log(`seconds elapsed = ${Math.floor(millis / 1000)}`);
  // Expected output: "seconds elapsed = 2"
}, 2000);


window.addEventListener("load",()=>{
  let today = new Date ();
  document.getElementById("today").innerHTML=today;
});