console.log('arquivo de scripts importado');
function verifica(cpf){
    window.location="excluirProfessor.php?CPF=" + cpf;
}
function refreshId(id){

    document.getElementById('ID') = id;
    console.log('atualizou para o id '+id);
    setTimeout(refreshId(id),2000);

}
function refreshColor(input,id){
            
    if(document.getElementById(input).checked){
        document.getElementById(id).style.fill = '#dc3545';
    }else{
        document.getElementById(id).style.fill = '#3ABEB3';
    }
}
function refreshPresenca(){
    
    if(document.getElementById('PRESENTE').checked){
        document.getElementById('LABEL_PRESENTE').innerText = 'Presente';
        document.getElementById('LABEL_PRESENTE').classList.remove('text-danger');
    }else{
        document.getElementById('LABEL_PRESENTE').innerText = 'Ausente';
        document.getElementById('LABEL_PRESENTE').classList.add('text-danger');
    }
}
function refreshResults(){
    
    $(document).ready(function(){
        //console.log('refreshResults [url:'+document.getElementsByTagName('form')[0].getAttribute('action')+']');
        $('form').submit(function(){
            var dados = $(this).serialize();
            
            $.ajax({
                //pega o atributo action do form da página host, fazendo o select específico para cada página
                url: document.getElementsByTagName('form')[0].getAttribute('action'),
                method: 'post',
                dataType: 'html',
                data: dados,
                success: function(data){
                    $('#resultado').empty().html(data);
                }
            });
            return false;
        });
        
        $('form').trigger('submit');
    });
}
function refreshDatas(){
    
    dmaior = new Date(document.getElementById('MAIOR_DATA').value);
    dmenor = new Date(document.getElementById('MENOR_DATA').value);

    msg=false;
    
    if(dmenor > dmaior){
        //document.getElementById('MENOR_DATA').value = document.getElementById('MAIOR_DATA').value;
        msg=true;
    }

    if(dmaior < dmenor){
        //document.getElementById('MAIOR_DATA').value = document.getElementById('MENOR_DATA').value;
        msg=true;
    }
    if(msg==true){
        window.alert("A primeira data precisa ser menor que a segunda!");
    }

}
function atualizarOpcao(checkbox1,input1, checkbox2,input2){
    if(document.getElementById(checkbox1).checked){
        document.getElementById(input1).classList.remove('d-none');
        document.getElementById(input1).required = true;
        document.getElementById(checkbox1).required = true;
    }else{
        document.getElementById(input1).value = '';
        document.getElementById(input1).classList.add('d-none');
        document.getElementById(input1).required = false;
        document.getElementById(checkbox1).required = false;
    }

    if(document.getElementById(checkbox2).checked){
        document.getElementById(input2).classList.remove('d-none');
        document.getElementById(input2).required = true;
        document.getElementById(checkbox2).required = true;
    }else{
        document.getElementById(input2).value = '';
        document.getElementById(input2).classList.add('d-none');
        document.getElementById(input2).required = false;
        document.getElementById(checkbox2).required = false;
    }

    refreshDataPesquisa();

    if(!document.getElementById(checkbox1).checked &&
        !document.getElementById(checkbox2).checked && 
        !document.getElementById('data').checked){

        document.getElementById(checkbox1).checked = true;
        document.getElementById(checkbox1).required = true;
        document.getElementById(input1).classList.remove('d-none');
        document.getElementById(input1).required = true;
        document.getElementById(input2).value = '';
        refreshDataPesquisa();
        atualizarOpcao(checkbox1,input1, checkbox2,input2);
    }
}

function refreshDataPesquisa(){
    if(document.getElementById('data').checked){
        document.getElementById('datas').classList.remove('d-none');
        document.getElementById('MAIOR_DATA').required = true;
        document.getElementById('MENOR_DATA').required = true;
        document.getElementById('data').required = true;
    }else{
        document.getElementById('datas').classList.add('d-none');
        document.getElementById('MAIOR_DATA').required = false;
        document.getElementById('MENOR_DATA').required = false;
        document.getElementById('data').required = false;
    }
}

function svgIndexFocus(cor){
    //define as cores do svg do index a partir da 
    document.getElementById('linha-1').style.fill = cor;
    document.getElementById('linha-2').style.fill = cor;
    document.getElementById('linha-3').style.fill = cor;
    document.getElementById('circulo').style.fill = cor;
    document.getElementById('a24dc8e0-63f3-4c57-9da7-8d00cfa1aebe').style.fill = cor+'77';
    document.getElementById('bc8b2ee0-9ec2-4139-a7e3-e0b1b1382397').style.fill = cor+'77';
    document.getElementById('a6bcb68f-fec1-4497-88cc-56de52c10faf').style.fill = cor+'77';
    document.getElementById('a1650e23-bf32-4c95-848c-aacb59e17a01').style.fill = cor+'77';
}