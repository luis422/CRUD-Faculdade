<?php

error_reporting(0);

if($_GET["CPF"]!=NULL and $_GET["CPF"]!=""){
    $value=$_GET["CPF"];
}else{
    header("location:editarProfessorCpf.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Professor</title>
    <link rel="shortcut icon" href="icon/favicon.png" />
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <script src="scripts/script.js"></script>
</head>
<body class="bg-secondary">
    <div class="container bg-white rounded mt-4 mb-4 pt-2 pb-3 panel">
        <p class="h3 mt-4 text-center fw-bold text-title user-select-none">Editar Professor</p>
        <div class="w100 border mt-4"></div>
        <div class="container-sm mt-4 mb-4">
            <div class="col col-11 offset-1">

                <?php
                    include("backend/conecta.php");
                    try{
                        $cpf=$_GET["CPF"];
                        $seleciona=mysqli_query($conexao, "SELECT * FROM professor WHERE CPF='$cpf'");
                        $campo=mysqli_fetch_array($seleciona);
                    }catch(Exception $e){
                        header("location:erro.php?e=$e");
                    }
                ?>

                <form action="backend/updateProf.php" method="POST">
                    <div class="row">
                        <div class="col col-12 col-sm-3 col-lg-2 text-body mt-4 mb-4">
                            <span class="d-flex justify-content-center">
                                <svg class="w-100 img-fluid rounded" id="b6e28ecf-d1c4-423b-a9d1-735f4ff450d8" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="494.8956" height="727.77805" viewBox="0 0 494.8956 727.77805"><path d="M707.58239,392.43026s2.40288,32.4393,2.40288,33.64077S693.16492,510.173,693.16492,510.173s-24.02912,45.65533,0,44.45388,16.82035-43.25239,16.82035-43.25239L735.21586,441.69l-10.81312-49.25971Z" transform="translate(-352.5522 -86.11098)" fill="#ffb8b8"/><polygon points="473.975 669.159 477.579 695.591 452.348 697.994 455.953 665.554 473.975 669.159" fill="#ffb8b8"/><polygon points="394.679 669.159 391.074 695.591 416.305 697.994 412.7 665.554 394.679 669.159" fill="#ffb8b8"/><path d="M719.59692,507.77006l-6.00729,8.41021s-3.60436,36.04365,0,48.05824,10.81311,67.28157,10.81311,70.88592,1.20147,6.00729,0,7.20871,0,13.216,0,13.216v6.00729l15.619,88.90778s-9.61165,10.81312-2.40294,10.81312,33.64076,0,32.43929-12.01454l-2.40288-1.20147s-3.60435-79.29612-2.40294-82.90048,2.40294-26.43206,2.40294-26.43206L778.46828,565.44l20.42477,70.886L803.69887,742.054s-4.80582,12.01459,0,14.41747,25.23053,10.81312,26.43206-1.20147,7.20871-116.54125,7.20871-121.34707-2.40289-79.2961-2.40289-79.2961,1.20147-12.01456,2.40289-14.41747-1.20147-4.80582,0-8.41018-2.40289-15.61894-2.40289-15.61894L780.87128,501.7628Z" transform="translate(-352.5522 -86.11098)" fill="#2f2e41"/><path d="M761.64792,776.89627s6.0073-6.0073-2.40294-6.0073a39.10708,39.10708,0,0,0-15.61894,3.60436l-6.00729,21.62618s-24.62986,19.82409,3.00367,17.4212,31.83856-3.00367,33.04-5.40656c.84324-1.68645-.68079-19.352-1.66455-29.73632a2.79014,2.79014,0,0,0-4.4956-1.95555A4.72393,4.72393,0,0,1,761.64792,776.89627Z" transform="translate(-352.5522 -86.11098)" fill="#2f2e41"/><path d="M813.31052,776.89627s-6.0073-6.0073,2.40294-6.0073a39.10708,39.10708,0,0,1,15.61894,3.60436l6.00729,21.62618s24.62986,19.824-3.00361,17.42109-35.443-3.00368-36.64445-5.40656c-.83691-1.67379,2.407-19.08772,4.45256-29.50125a3.43783,3.43783,0,0,1,5.47252-2.0631A4.69089,4.69089,0,0,0,813.31052,776.89627Z" transform="translate(-352.5522 -86.11098)" fill="#2f2e41"/><path d="M724.40274,289.105s4.80583,24.02914,4.80583,27.6335,20.42476,14.41746,20.42476,14.41746L772.461,302.321s-14.41747-20.42475-14.41747-25.23056Z" transform="translate(-352.5522 -86.11098)" fill="#ffb8b8"/><path d="M742.42457,320.34287s-10.47159-2.78717-13.646-7.40086c0,0-33.21083,32.63145-33.21083,38.63872l26.43206,46.85679s0,16.82039,2.40294,18.02183,0,0,0,4.80583-7.2087,36.04365-4.80582,40.84953,4.80582,1.20144,2.40288,8.41018-8.41017,45.65535-8.41017,45.65535,21.62618-7.20873,52.86406,4.80583,68.483-4.80583,68.483-4.80583-9.61165-21.62621-7.20871-28.83491-6.00729-20.42477-6.00729-20.42477l-6.0073-110.534s8.41018-49.25971,2.40289-51.66262l-12.01454-4.80588-38.47542-4.72878S758.04351,319.14141,742.42457,320.34287Z" transform="translate(-352.5522 -86.11098)" fill="#3f3d56"/><path d="M707.58239,343.17053l-12.01459,8.4102s-6.00729,18.02182,0,26.432,8.41018,20.42476,8.41018,20.42476l24.02912-2.40291Z" transform="translate(-352.5522 -86.11098)" fill="#3f3d56"/><path d="M711.4427,259.05823V149.51289A63.40184,63.40184,0,0,0,648.04091,86.111H415.95418a63.40185,63.40185,0,0,0-63.402,63.40172V750.48711A63.40186,63.40186,0,0,0,415.954,813.889H648.0406a63.40186,63.40186,0,0,0,63.402-63.40167V337.03447Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><path d="M650.59895,102.606H620.304a22.49484,22.49484,0,0,1-20.82715,30.99052H466.51735a22.4948,22.4948,0,0,1-20.82715-30.99056H417.3946a47.3478,47.3478,0,0,0-47.34783,47.34774V750.04625a47.34781,47.34781,0,0,0,47.34777,47.34784H650.59895a47.3478,47.3478,0,0,0,47.34784-47.34778h0V149.9537A47.34776,47.34776,0,0,0,650.59895,102.606Z" transform="translate(-352.5522 -86.11098)" fill="#fff"/><path d="M681.394,370.82205H393.12618a5.34457,5.34457,0,0,1-5.33828-5.33828V293.97683a5.34457,5.34457,0,0,1,5.33828-5.33829H681.394a5.34457,5.34457,0,0,1,5.33828,5.33829v71.50694A5.34457,5.34457,0,0,1,681.394,370.82205ZM393.12618,290.77386a3.20647,3.20647,0,0,0-3.203,3.203v71.50694a3.20647,3.20647,0,0,0,3.203,3.203H681.394a3.20647,3.20647,0,0,0,3.203-3.203V293.97683a3.20647,3.20647,0,0,0-3.203-3.203Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><circle cx="85.36494" cy="240.87558" r="21.74535" fill="#e6e6e6"/><path d="M488.13853,312.48966a3.62423,3.62423,0,0,0,0,7.24845H658.99482a3.62423,3.62423,0,1,0,0-7.24845Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><path d="M488.13853,334.235a3.62422,3.62422,0,0,0,0,7.24845h73.52a3.62422,3.62422,0,1,0,0-7.24845Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><path d="M681.394,602.82205H393.12618a5.34457,5.34457,0,0,1-5.33828-5.33828V525.97683a5.34457,5.34457,0,0,1,5.33828-5.33829H681.394a5.34457,5.34457,0,0,1,5.33828,5.33829v71.50694A5.34457,5.34457,0,0,1,681.394,602.82205ZM393.12618,522.77386a3.20647,3.20647,0,0,0-3.203,3.203v71.50694a3.20647,3.20647,0,0,0,3.203,3.203H681.394a3.20647,3.20647,0,0,0,3.203-3.203V525.97683a3.20647,3.20647,0,0,0-3.203-3.203Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><circle cx="85.36494" cy="472.87558" r="21.74535" fill="#e6e6e6"/><path d="M488.13853,544.48966a3.62422,3.62422,0,0,0,0,7.24845H658.99482a3.62423,3.62423,0,1,0,0-7.24845Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><path d="M488.13853,566.235a3.62423,3.62423,0,0,0,0,7.24845h73.52a3.62422,3.62422,0,1,0,0-7.24845Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><path d="M684.72783,416.97693v71.50994a5.34331,5.34331,0,0,1-5.33008,5.34H531.4478v-80.8h151.52A5.29414,5.29414,0,0,1,684.72783,416.97693Z" transform="translate(-352.5522 -86.11098)" fill="#3abeb3"/><rect x="254.53525" y="325.5258" width="2" height="80.05029" fill="#fff"/><path d="M682.96782,413.02691a5.24055,5.24055,0,0,0-3.57007-1.39H391.1278a5.35181,5.35181,0,0,0-5.34,5.34v71.50994a5.35181,5.35181,0,0,0,5.34,5.34h288.27a5.34331,5.34331,0,0,0,5.33008-5.34V416.97693A5.29414,5.29414,0,0,0,682.96782,413.02691Zm-.37,75.46a3.20948,3.20948,0,0,1-3.20008,3.2H391.1278a3.203,3.203,0,0,1-3.2-3.2V416.97693a3.19657,3.19657,0,0,1,3.2-3.2h288.27a3.203,3.203,0,0,1,3.20008,3.2Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><path d="M482.99779,449.48687h-68.86a3.625,3.625,0,0,0,0,7.25h68.86a3.625,3.625,0,0,0,0-7.25Z" transform="translate(-352.5522 -86.11098)" fill="#e6e6e6"/><path d="M565.8631,444.7472a6.60068,6.60068,0,0,0-8.89.66571,6.783,6.783,0,0,0,.33706,9.38327l8.43057,8.43056a1,1,0,0,0,1.41421,0l8.43057-8.43057a6.783,6.783,0,0,0,.337-9.38334,6.6007,6.6007,0,0,0-8.89-.66563A.95249.95249,0,0,1,565.8631,444.7472Z" transform="translate(-352.5522 -86.11098)" fill="#fff"/><path d="M653.667,463.92691H641.22858a1,1,0,0,1-.97014-.75747l-3.5-14a1,1,0,0,1,.97014-1.24253H657.167a1,1,0,0,1,.97014,1.24253l-3.5,14A1,1,0,0,1,653.667,463.92691Z" transform="translate(-352.5522 -86.11098)" fill="#fff"/><path d="M647.4478,452.42691a.50065.50065,0,0,0-.5.5v7a.5.5,0,0,0,1,0v-7A.50065.50065,0,0,0,647.4478,452.42691Z" transform="translate(-352.5522 -86.11098)" fill="#3abeb3"/><path d="M651.023,459.793a.50035.50035,0,0,0,.96386.269l1.88575-6.74072a.50036.50036,0,0,0-.96387-.269Z" transform="translate(-352.5522 -86.11098)" fill="#3abeb3"/><path d="M641.50542,452.68574a.49271.49271,0,0,0-.13477.01856.50124.50124,0,0,0-.34765.6167l1.88574,6.74072a.50042.50042,0,0,0,.96387-.26953l-1.88575-6.74121A.5016.5016,0,0,0,641.50542,452.68574Z" transform="translate(-352.5522 -86.11098)" fill="#3abeb3"/><path d="M656.4478,445.92691h-7v-1a2,2,0,0,0-4,0v1h-7a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Z" transform="translate(-352.5522 -86.11098)" fill="#fff"/><circle cx="382.66366" cy="180.16635" r="31.23787" fill="#ffb8b8"/><path d="M711.36589,233.26426l-5.41858-2.16931s11.32972-12.47338,27.093-11.38872l-4.43349-4.881s10.83721-4.33853,20.68916,7.05018c5.179,5.98682,11.17112,13.024,14.9066,20.95127h5.80293l-2.42195,5.33283,8.47676,5.33281-8.70059-.95792a29.50893,29.50893,0,0,1-.82293,13.81142l.2332,4.21506s-10.08521-15.60386-10.08521-17.77315V258.211s-5.41858-4.88088-5.41858-8.13481l-2.9556,3.79627-1.47777-5.96557-18.22614,5.96557,2.95555-4.88089-11.32973,1.627L724.666,244.653s-12.80755,7.05019-13.30024,13.01577-6.89629,13.558-6.89629,13.558l-2.95555-5.42323S697.08061,241.39906,711.36589,233.26426Z" transform="translate(-352.5522 -86.11098)" fill="#2f2e41"/><path d="M796.49011,353.98364s-6.95746,17.89056-5.50412,35.59156a18.75982,18.75982,0,0,0,3.10123,8.86232h0l-85.23667,40.46634s-38.51334,3.9875-28.90169,20.80791,44.45388-8.41018,44.45388-8.41018,91.31072-13.216,98.51943-26.432,12.01458-68.483,12.01458-68.483Z" transform="translate(-352.5522 -86.11098)" fill="#ffb8b8"/><path d="M800.09452,304.72393h18.02182s13.216,2.40291,16.82041,26.432,7.20871,30.03641,3.60436,30.03641-46.85677-1.20147-46.85677-2.40291S800.09452,304.72393,800.09452,304.72393Z" transform="translate(-352.5522 -86.11098)" fill="#3f3d56"/></svg>
                            </span>
                        </div>
                        <div class="col col-12 col-sm-9 col-lg-8">
                            <div class="row">
                                <div class="col col-2 col-lg-1">
                                    <label class="mt-3 text-muted user-select-none mb-2">ID</label><br>
                                    <span class="border rounded text-muted p-2"><?=$campo["ID"]?></span>
                                    <input class="btn-outline-green form-control w-100 text-muted d-none" type="hidden" value="<?=$campo["ID"]?>" name="ID" id="ID">
                                </div>
                                <div class="col col-10 col-lg-11">
                                    <label class="mt-3 user-select-none" for="NOME" ><span class="text-danger fw-bold">*</span>Nome</label><br>
                                    <input class="btn-outline-green form-control w-100" type="text" value="<?=$campo["NOME"]?>" name="NOME" id="NOME" maxlength="100" required>
                                </div>
                                <div class="col col-12 col-sm-4 col-lg-4">
                                    <label class="mt-3 user-select-none" for="CPF" ><span class="text-danger fw-bold">*</span>CPF</label><br class="user-select-none">
                                    <input class="btn-outline-green form-control w-100" type="text" value="<?=$campo["CPF"]?>" name="CPF" id="CPF" maxlength="14" required>
                                </div>
                                <div class="col col-12 col-sm-5 col-lg-5">
                                    <label class="mt-3 user-select-none" for="TELEFONE" >Telefone</label><br>
                                    <input class="btn-outline-green form-control w-100" type="text" value="<?=$campo["TELEFONE"]?>" name="TELEFONE" id="TELEFONE" maxlength="17">
                                </div>
                                <div class="col col-12 col-sm-3">
                                    <label class="mt-3 user-select-none" for="IDADE" ><span class="text-danger fw-bold">*</span>Idade</label><br>
                                    <input class="btn-outline-green form-control w-100" type="number" min="18" max="100" value="<?=$campo["IDADE"]?>" name="IDADE" id="IDADE" min="1" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-12 col-lg-12">
                                    <label class="mt-3 user-select-none" for="ATIVIDADE_RESPONSAVEL"><span class="text-danger fw-bold">*</span>Atividade Responsável</label><br>
                                    <textarea class="btn-outline-green form-control" rols="3" class="w-100" type="text" name="ATIVIDADE_RESPONSAVEL" id="ATIVIDADE_RESPONSAVEL" maxlength="250" required><?=$campo["ATIVIDADE_RESPONSAVEL"]?></textarea>
                                </div>
                            </div>
                            </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <input class="btn-outline-green p-4 pt-1 pb-1 bg-button rounded btn text-white" value="Ok" type="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>