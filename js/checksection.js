function checksection() {
  var sum = 0;
  var a = document.getElementsByTagName('input');
  for (var i = 0; i < a.length; i++) {
    var elem = a[i];
    if (elem.type == 'radio' && elem.className == 'question' && elem.checked == true) {
      sum += Number(elem.value);
    }
  }
  document.getElementById('total').value = sum.toFixed(2);
}
