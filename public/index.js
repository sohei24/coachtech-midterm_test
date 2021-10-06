// 郵便番号(全角を半角)＠index.blade.php
const postcodeInput = document.getElementById('postcode');
postcodeInput.addEventListener('blur', () => {
let postcodeInputValue = postcodeInput.value;
postcodeInputValue = postcodeInputValue.replace(/[‐－―ー]/g, '-');
const replacedValue = postcodeInputValue.replace(/[０-９]/g,
    function(str){
        return String.fromCharCode(str.charCodeAt(0) - 0xFEE0)
    });
postcodeInput.value = replacedValue;
}, false);

// 入力時にエラー表示＠index.blade.php
//(苗字)
const family_name = document.getElementById("family_name");
family_name.addEventListener("blur", function() {
  if(family_name.value == "")
  alert("The family name field is required.");
});
//(名前)
const first_name = document.getElementById("first_name");
first_name.addEventListener("blur", function () {
  if(first_name.value == "")
  alert("The first name field is required.");
});
//(メールアドレス)
const email = document.getElementById("email");
email.addEventListener("blur", function () {
  //メールアドレス記載無し or メールアドレスに@が入っていない場合
  if(email.value == "" || !email.value.includes('@'))
  alert("Proper email is required.");
});
//(郵便番号)
const postcode = document.getElementById("postcode");
postcode.addEventListener("blur", function () {
  //郵便番号記載無し or 郵便番号に-が入っていない場合
  if(postcode.value == "" || !postcode.value.includes('-'))
  alert("Proper postcode is required.");
});
//(住所)
const address = document.getElementById("address");
address.addEventListener("blur", function () {
  if(address.value == "")
  alert("The address field is required.");
});
//(ご意見)
const opinion = document.getElementById("opinion");
opinion.addEventListener("blur", function () {
  if(opinion.value == "")
  alert("The opinion field is required.");
});

