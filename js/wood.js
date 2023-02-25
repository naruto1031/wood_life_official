const img_src = ["./image/endai03.png","./image/udk20110916ust.png"];
let num = 0;

function slide_time() {
  if (num === 1) {
	num = 0;
  } else {
	num++;
  }
  document.getElementById("slide_img").src = img_src[num];
}

setInterval(slide_time, 10000);
