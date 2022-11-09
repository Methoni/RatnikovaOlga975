// ==UserScript==
// @name         Bing Bot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for Bing
// @author       Olga Ratnikova
// @match        https://www.bing.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let links = document.links;
let btnS = document.getElementById("search_icon");
let keywords = ["купля-продажа авто", "автомобили б/у", "автомобили купить"];
let keyword = keywords[getRandom(0, keywords.length)];

if (btnS !== null) {
document.getElementsByName("q")[0].value = keyword;
console.log("Lala");
  btnS.click();
}
else {
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("auto.ru") !== -1) {
      let link = links[i];
      console.log("Нашёл строку " + link);
      link.click();
      break;
    }
  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min)
}
