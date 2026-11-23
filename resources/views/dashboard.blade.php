const tubuhular = [
  {
 x:100,
  y:100
  }
];
const apel ={
  x:100,
  y:100
};
let panjangular:number = 1;
if (
  tubuhular[0].x === apel.x &&
  tubuhular[0].y === apel.y 
) {
  panjangular = panjangular + 1;
  console.log("apel dimakan!")
  console.log("Panjang Ular:", panjangular);
    apel.x = Math.floor(Math.random() * 400);
    apel.y = Math.floor(Math.random() * 400);
    console.log("Posisi Apel baru:", apel.x, apel.y);
}
// Canvas
const canvas = document.getElementById("gameCanvas") as HTMLCanvasElement;
const ctx = canvas.getContext("2d")!;
  
ctx.fillStyle = "blue";
ctx.fillRect(
  tubuhular[0].x,
  tubuhular[0].y,
  50, // width
  50 // height
);
ctx.fillStyle = "red";
ctx.fillRect(
  apel.x,
  apel.y,
  50, // width
  50 // height
);
const namapemain : string =  "Rudi";
const gameover : boolean = false;
let nyawa : number = 3;
console.log("Nama:", namapemain);
console.log("Game Over:", gameover);
;
let score : number = 0;
console.log("game over:", score);