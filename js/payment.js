function cc_format(value) {
    var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
    var matches = v.match(/\d{4,16}/g);
    var match = matches && matches[0] || ''
    var parts = []
    for (i=0, len=match.length; i<len; i+=4) {
      parts.push(match.substring(i, i+4))
    }
    if (parts.length) {
      return parts.join(' ')
    } else {
      return value
    }
  }
  
  onload = function() {
    document.getElementById('cc').oninput = function() {
      this.value = cc_format(this.value)
      document.querySelector('.card-number-box').innerText = this.value;
    }
  }
  
  function checkDigit(event) {
      var code = (event.which) ? event.which : event.keyCode;
  
      if ((code < 48 || code > 57) && (code > 31)) {
          return false;
      }
  
      return true;
  }
  
  
  document.querySelector('.card-holder-input').oninput = () =>{
      document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
  }
  
  document.querySelector('.month-input').oninput = () =>{
      document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
  }
  
  document.querySelector('.year-input').oninput = () =>{
      document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
  }
  
  document.querySelector('.cvv-input').onmouseenter = () =>{
      document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
      document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
  }
  
  document.querySelector('.cvv-input').onmouseleave = () =>{
      document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
      document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
  }
  
  document.querySelector('.cvv-input').oninput = () =>{
      document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
  }