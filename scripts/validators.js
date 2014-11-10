function isMail(mailField){
  strMail = mailField.value;
  var re = new RegExp;
  re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var arr = re.exec(strMail);
  if (arr == null)
    return(false);
  else
    return(true);
}

function minLen(txtField, minVal){
  strExp = txtField.value;
  l = strExp.length;
  if (l < minVal)
    return(true);
  else
    return(false);
}

function maxLen(txtField, maxVal){
  strExp = txtField.value;
  l = strExp.length;
  if (l > maxVal)
    return(true);
  else
    return(false);
}

function isBlank(txtField){
  if (txtField.value)
    return (false);
  else
    return(true);
}

function isSelectedZero(txtField){
  selected = txtField.selectedIndex;
  if (selected == 0)
    return(true);
  else
    return(false);
}

function isNumber(txtField){
  numExp = txtField.value;
  if (isNaN(numExp) || (numExp.length == 0))
    return (false);
  else
    return(true);
}

function isCPF(txtField){ 
  var i; 
  s = txtField.value;  
  var c = s.substr(0,9); 
  var dv = s.substr(9,2); 
  var d1 = 0; 
  for (i = 0; i < 9; i++){ 
    d1 += c.charAt(i)*(10-i); 
  } 
  if (d1 == 0) return false; 
  d1 = 11 - (d1 % 11); 
  if (d1 > 9) d1 = 0; 
  if (dv.charAt(0) != d1) return false; 
  d1 *= 2; 
  for (i = 0; i < 9; i++){ 
    d1 += c.charAt(i)*(11-i); 
  } 
  d1 = 11 - (d1 % 11); 
  if (d1 > 9) d1 = 0; 
  if (dv.charAt(1) != d1) return false; 
  return true; 
} 

// funÁ„o para formatar mascara padr„o
function formatar_mascara(src, mascara)
{
  var campo = src.value.length;
  var saida = mascara.substring(0,0);
  var texto = mascara.substring(campo);
  if(texto.substring(0,1) != saida) {
	src.value += texto.substring(0,1);}
}


function tiraAcento(text) { 
  text = text.replace(new RegExp('[¡¿¬√]','gi'), 'A'); 
  text = text.replace(new RegExp('[…» ]','gi'), 'E'); 
  text = text.replace(new RegExp('[ÕÃŒ]','gi'), 'I'); 
  text = text.replace(new RegExp('[”“‘’]','gi'), 'O'); 
  text = text.replace(new RegExp('[⁄Ÿ€]','gi'), 'U'); 
  text = text.replace(new RegExp('[«]','gi'), 'C'); 
  return text; 
} 

