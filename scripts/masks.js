
// colocar no onkeyprees do input onkeypress="mascara(this,data)" onde data é a função da mascara que deseja
function mask(o,f){
    objt = o;
    func = f;
    setTimeout("runMask()",1);
}
function runMask(){
    objt.value = func(objt.value);
}

// essas são mascaras existentes (não esquecer de colocar o maxlength nos campos)
function onlyNumbers(v){
    return v.replace(/\D/g,"");
}

function phoneNumber(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{0})(\d)/,"$1($2");
    v=v.replace(/(\d{3})(\d)/,"$1)$2");
    v=v.replace(/(\d{3})(\d)/,"$1-$2");
    return v;
}

function onlyChars(v){
    return v.replace(/\d/g,""); //Remove tudo o que não é Letra   
}
  
//Só letras maiúsculas
function onlyCharsUpper(v){   
v=v.toUpperCase(); //Maiúsculas   
return v.replace(/\d/g,""); //Remove tudo o que não é Letra ->maiusculas   
}   

//Só letras minúsculas
function onlyCharsLower(v){   
v=v.toLowerCase(); //Minusculas   
return v.replace(/\d/g,""); //Remove tudo o que não é Letra ->minusculas   
}

// essas são mascaras existentes (não esquecer de colocar o maxlength nos campos)
function currency(v){  
    v=v.replace(/\D/g,"");  //permite digitar apenas números
    v=v.replace(/[0-9]{12}/,"inválido");   //limita pra máximo 999.999.999,99
//    v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
//    v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
    v=v.replace(/(\d{1})(\d{1,2})$/,"$1.$2");   //coloca virgula antes dos últimos 2 digitos
    return v;
}
	
function time(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{2})(\d)/,"$1:$2");
    v=v.replace(/(\d{2})(\d)/,"$1:$2");
    return v;
}

function date(v){
    v=v.replace(/\D/g,"");
	v=v.replace(/(\d{2})(\d)/,"$1/$2");
	v=v.replace(/(\d{2})(\d)/,"$1/$2");
	return v;
}

function cnpj(v){
    v=v.replace(/\D/g,"");                           //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2");             //Coloca ponto entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3"); //Coloca ponto entre o quinto e o sexto dígitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2");           //Coloca uma barra entre o oitavo e o nono dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2");              //Coloca um hífen depois do bloco de quatro dígitos
    return v;
}

function cpf(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2");       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2");       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2"); //Coloca um hífen entre o terceiro e o quarto dígitos
    return v;
}

function cep(v){
    v=v.replace(/D/g,"");                //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2"); //Esse é tão fácil que não merece explicações
    return v;
}

function site(v){
    //Esse sem comentarios para que você entenda sozinho ;-)
    v=v.replace(/^http:\/\/?/,"");
    dominio=v;
    caminho="";
    if(v.indexOf("/")>-1);
        dominio=v.split("/")[0];
        caminho=v.replace(/[^\/]*/,"");
    dominio=dominio.replace(/[^\w\.\+-:@]/g,"");
    caminho=caminho.replace(/[^\w\d\+-@:\?&=%\(\)\.]/g,"");
    caminho=caminho.replace(/([\?&])=/,"$1");
    if(caminho!==""){
        dominio=dominio.replace(/\.+$/,"");
    }
    v="http://"+dominio+caminho;
    return v;
}