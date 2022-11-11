// ==UserScript==
// @name         Bing Bot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for Bing
// @author       Olga Ratnikova
// @match        https://www.bing.com/*
// @match        https://www.auto.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let links = document.links;
let btnS = document.getElementById("search_icon");
let keywords = ["купля-продажа авто", "автомобили б/у", "автомобили купить","тестовая абракадабра"];
let keyword = keywords[getRandom(0, keywords.length)];

let bingInput = document.getElementsByName("q")[0];
let bingNP = document.getElementsByClassName("sb_pagN_bp")[0];

if (btnS !== null) {
  let i = 0;
  let timerId = setInterval(()=>{
    bingInput.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      btnS.click();
    }
  },400);

} else if (location.hostname == "auto.ru") {
  console.log("Мы на целевом сайте!");

} else {
  let nextBingPage = true;
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("auto.ru") !== -1) {
      let link = links[i];
      nextBingPage = false;
      console.log("Нашел строку " + link);
      setTimeout(()=>{
        link.click();
      }, getRandom(1500, 4000));
      break;
    }
  }

  if (document.querySelector(".sb_pagS").innerText == "3") {
    nextBingPage = false;
    location.href = "https://www.bing.com/";
  }
  if (nextBingPage) {
    setTimeout(()=>{
      bingNP.click();
    }, getRandom(2000, 4000))

  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min)
}
