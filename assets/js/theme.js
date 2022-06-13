/* eslint-disable linebreak-style */
/* eslint-disable space-before-function-paren */
/* eslint-disable prefer-const */
/* eslint-disable linebreak-style */
/* eslint-disable space-in-parens */
/* eslint-disable indent */
/* eslint-disable quotes */
document.addEventListener("DOMContentLoaded", function () {
  let div,
    n,
    v = document.getElementsByClassName("youtube-player");
  for (n = 0; n < v.length; n++) {
    div = document.createElement("div");
    div.setAttribute("data-id", v[n].dataset.id);
    div.innerHTML = labnolThumb(v[n].dataset.id);
    div.onclick = labnolIframe;
    v[n].appendChild(div);
  }
});

function labnolThumb(id) {
  const thumb = '<img src="https://i.ytimg.com/vi/ID/maxresdefault.jpg">',
    play = '<div class="play"></div>';
  return thumb.replace("ID", id) + play;
}

function labnolIframe() {
  const iframe = document.createElement("iframe");
  const embed = "https://www.youtube.com/embed/ID?autoplay=1";
  iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
  iframe.setAttribute("frameborder", "0");
  iframe.setAttribute("allowfullscreen", "1");
  this.parentNode.replaceChild(iframe, this);
}

jQuery(document).ready(function ($) {
  "use strict";
});
