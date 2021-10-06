// (検索結果表示時)マウスオーバーした際に、省略されていた「ご意見」を表示＠find.blade.php
let short_opinion = document.getElementsByClassName("short_opinion");
let full_opinion = document.getElementsByClassName("full_opinion");
for (let i = 0; i < short_opinion.length; i++) {
  short_opinion[i].addEventListener("mouseover", () => {
    short_opinion[i].textContent  = full_opinion[i].textContent;
  }, false);
}