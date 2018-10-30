window.addEventListener('load', carrega);
window.addEventListener('load', addEletro);
window.addEventListener('load', addParcela);
window.addEventListener('load', addBloco);



var db = openDatabase("Agritech", "1.0", "AgriTech Semiárido", 100 * 1024 * 1024);

function carrega(){   
    addPlantaParcela();
    addPlantaBloco();

    document.getElementById('btn-salvar_planta').addEventListener('click', salvarPlanta);

    //Tabela de plantas
    db.transaction(function(tx) {
        tx.executeSql("CREATE TABLE IF NOT EXISTS plantas ( id_planta INTEGER PRIMARY KEY,nome TEXT,img TEXT, imgV TEXT, cor TEXT)");
    });

    //Tabela das Parcelas
    db.transaction(function(tx) {
        tx.executeSql("CREATE TABLE IF NOT EXISTS parcelas ( id_parcela INTEGER PRIMARY KEY,id_planta TEXT,nome TEXT,img TEXT, imgV TEXT, cor TEXT, bloco INTEGER, eletro TEXT)");
    });

    //Tabela dos blocos
    db.transaction(function(tx) {
        tx.executeSql("CREATE TABLE IF NOT EXISTS blocos ( id_bloco INTEGER PRIMARY KEY,id_planta TEXT,nome TEXT,img TEXT, imgV TEXT, cor TEXT, qntP INTEGER)");
    });

    //Tabela de Eventos
    // db.transaction(function(tx) {
    //     tx.executeSql("CREATE TABLE IF NOT EXISTS events ( id_events INTEGER PRIMARY KEY, title TEXT,color TEXT,start DATETIME,end DATE)");
    // });
}

function salvarPlanta(){
    var id = document.getElementById('field-id').value;
    var nome_planta = document.getElementById('nome_planta').value;
    var cores = document.getElementById('cores').value;
    var img_planta = '../img/'+document.getElementById('img_planta').value;
    var imgV = '../img/imgspng/vaso.png';

    if(nome_planta !==null && cores !==null && img_planta !== null){
        db.transaction(function(tx) {
            tx.executeSql('INSERT INTO plantas (nome,img,imgV,cor) VALUES (?, ?, ?, ?)', [nome_planta,img_planta,imgV,cores]);
        });
    }

    addPlantaParcela();
    addPlantaBloco();
}

function addPlantaParcela(){
    var plantasP = document.getElementById('plantasP');
    db.transaction(function(tx) {
        tx.executeSql('SELECT * FROM plantas', [], function (tx, resultado) {
            var rows = resultado.rows;
            var ul = '';
            for(var i = 0; i < rows.length; i++){
                ul += "<li style='text-indent: 30px;' class='green accent-4'>";
                id_planta = "\""+rows[i].id_planta+"\"";
                nome = "\""+rows[i].nome+"\"";
                img = "\""+rows[i].img+"\"";
                imgV = "\""+rows[i].imgV+"\"";
                cor = "\""+rows[i].cor+"\"";
            
                ul += "<a class='planta' onclick='salvarParcela("+id_planta+','+nome+','+img+','+imgV+','+cor+")' id='planta"+rows[i].id_planta+"'>";
                ul += "<img style='height: 30px; width:30px; margin-top:7px' class='circle right' src = '"+rows[i].img+"'>";//IMG ESTA IGUAL IMG_PLANTA
                ul+= "<span class='white-text'>"+rows[i].nome+"</span>";
                ul += "</a>";
                ul += "</li>";          
            }
            plantasP.innerHTML = ul; 
        }, null);
    });
}

function addPlantaBloco(){
    var plantasB = document.getElementById('plantasB');
    db.transaction(function(tx) {
        tx.executeSql('SELECT * FROM plantas', [], function (tx, resultado) {
            var rows = resultado.rows;
            var ul = '';
            for(var i = 0; i < rows.length; i++){
                ul += "<li style='text-indent: 30px;' class='green accent-4'>";
                id_planta = "\""+rows[i].id_planta+"\"";
                nome = "\""+rows[i].nome+"\"";
                img = "\""+rows[i].img+"\"";
                imgV = "\""+rows[i].imgV+"\"";
                cor = "\""+rows[i].cor+"\"";
                cor = "\""+rows[i].cor+"\"";

                ul += "<a class='planta' onclick='salvarBloco("+id_planta+','+nome+','+img+','+imgV+','+cor+")' id='planta"+rows[i].id_planta+"'>";
                ul += "<img style='height: 30px; width:30px; margin-top:7px' class='circle right' src = '"+rows[i].img+"'>";
                ul += "<span class='white-text'>"+rows[i].nome+"</span>";
                ul += "</a>";
                ul += "</li>";          
            }
            plantasB.innerHTML = ul; 
        }, null);
    });
}

function salvarParcela(id_planta, nome, img_planta, imgV, cor){
    var bloco = "";
    var eletro = "";
    var eletromodal = document.getElementById('eletro_modal');
    db.transaction(function(tx) {
        
        tx.executeSql("INSERT INTO parcelas (id_planta, nome, img, imgV, cor, bloco, eletro) VALUES (?, ?, ?, ?, ?, ?, ?)", [id_planta, nome, img_planta, imgV, cor, bloco, eletro]);
    });

    addParcela();
}

function salvarBloco(id_planta, nome, img_planta, imgV, cor){
    qntP = prompt("Quantas parcelas terá nesse bloco?");
    eletro = "";
    if(qntP != '' && qntP != null && qntP != 0){
        if(qntP){
            db.transaction(function(tx) {
                tx.executeSql("INSERT INTO blocos (id_planta, nome, img, imgV, cor, qntP) VALUES (?, ?, ?, ?, ?, ?)", [id_planta, nome, img_planta, imgV, cor, qntP]);
                
                tx.executeSql('SELECT * FROM blocos',[], function (tx, resultado) {
                    var rows = resultado.rows;

                    for(var p = 0; p < rows.length; p++){
                        id_bloco = rows[p].id_bloco;  
                    }

                    for(var a = 0; a < qntP; a++){
                        tx.executeSql("INSERT INTO parcelas (id_planta, nome, img, imgV, cor, bloco, eletro) VALUES (?, ?, ?, ?, ?, ?, ?)", [id_planta, nome, img_planta, imgV, cor, id_bloco, eletro]);
                    }
                    
                });
            });
        }
    }

    addBloco();
}

function addParcela(){
    var parcelas = document.getElementById('parcelas');

    db.transaction(function(tx) {
        tx.executeSql('SELECT * FROM parcelas WHERE bloco = ""', [], function (tx, resultado) {
            var rows = resultado.rows;
            var divP = '';
                
            for(var p = 0; p < rows.length; p++){
                id_parcela = "\""+rows[p].id_parcela+"\"";
                id_planta = "\""+rows[p].id_planta+"\"";
                eletro = "\""+rows[p].eletro+"\"";
                divP += "<li style='padding-bottom:10px; padding-top:10px; background: rgba(0, 200, 83, 0.7); border-radius: 5px;'>";
                divP += "<img style='height:60px; width:60px;' class='circle' src = '"+rows[p].img+"'>";
                
                for(v = 0; v < 10; v++){
                    divP += "<img style='height: 60px; width:60px; filter: alpha (opacity=50);' src = '"+rows[p].imgV+"'>";
                }
                
                // if(rows[p].eletro!= ''){
                //     divP += "<a><img onclick='salvarEletro("+id_planta+','+id_parcela+','+eletro+")' style='margin-right:20px; height:60px; width:60px;' src='"+rows[p].eletro+"'></a>";
                // }
                // else{
                //     divP += "<a><img onclick='salvarEletro("+id_planta+','+id_parcela+','+eletro+")' style='opacity:0.5; margin-right:20px; height:60px; width:60px;' src='img/imgspng/eletrovalvula.png'></a>";
                // }
                
                divP += "<a onclick='addBlocoModal("+id_planta+','+id_parcela+")' href='#modal' class='modal-trigger btn-floating blue darken-4' style='margin-top:-60px; margin-right:10px;'><i class='material-icons'>settings</i></a>";
                divP += "<a onclick='deletarP("+id_parcela+")' class='btn-floating red accent-4' style='margin-top:-60px; margin-right:10px;'><i class='material-icons'>delete</i></a>";
                divP += "<hr id='"+rows[p].id_parcela+"' style='height: 10px; border:none; background:black; width:70%; border-radius:5px;'>";
                divP += "</li>";
                divP +="<br>";

            }

            parcelas.innerHTML = divP; 
        }, null);
    });
}

function addBloco(){
    var blocos = document.getElementById('blocos');
    db.transaction(function(tx) {
        
        tx.executeSql("SELECT * FROM parcelas WHERE bloco != '' ORDER BY bloco", [], function (tx, resultado) {
            var rows = resultado.rows;
            var divB = '';
                
            for(var b = 0; b < rows.length; b++){
                id_parcela = "\""+rows[b].id_parcela+"\"";
                id_planta = "\""+rows[b].id_planta+"\"";
                bloco = "\""+rows[b].bloco+"\"";
                qntP = "\""+rows[b].qntP+"\"";
                
                divB += "<li style='padding-bottom:10px; padding-top:10px; background: rgba(0, 200, 83, 0.7); border-radius: 5px;'>";
                divB += "<img style='height: 60px; width:60px;' class='circle' src = '"+rows[b].img+"'>";
                
                for(v = 0; v < 10; v++){
                    divB += "<img style='height: 60px; width:60px; filter: alpha (opacity=50);' src = '"+rows[b].imgV+"'>";
                }
                // if(rows[b].eletro!= ''){
                //     divB += "<a><img onclick='salvarEletro("+id_planta+','+id_parcela+','+eletro+")' style='margin-right:20px; height:60px; width:60px;' src='"+rows[b].eletro+"'></a>";
                // }
                // else{
                //     divB += "<a><img onclick='salvarEletro("+id_planta+','+id_parcela+','+eletro+")' style='opacity:0.5; margin-right:20px; height:60px; width:60px;' src='img/imgspng/eletrovalvula.png'></a>";
                // }
                divB += "<a onclick='trocarBloco("+id_planta+','+id_parcela+','+bloco+")' href='#modal' class='modal-trigger btn-floating blue darken-4' style='margin-top:-60px; margin-right:10px;'><i class='material-icons'>settings</i></a>";
                divB += "<a onclick='deletarPB("+id_parcela+")' class='btn-floating red accent-4' style='margin-top:-60px; margin-right:10px;'><i class='material-icons'>delete</i></a>";
                divB += "<hr style='height: 10px; border:none; background:"+rows[b].cor+"; width:70%; border-radius:5px; box-shadow: 2px 3px 8px 2px #000;'>"; 
                divB += "</li>";
                divB +="<br>";
            }
            blocos.innerHTML = divB; 
        }, null);
    });
}

function deletarP(id_parcela){
    db.transaction(function(tx) {
        tx.executeSql("DELETE FROM parcelas WHERE id_parcela="+id_parcela);
    });
    
    addParcela();
}

function deletarPB(id_parcela){    
    db.transaction(function(tx) {
        tx.executeSql("SELECT*FROM parcelas WHERE id_parcela="+id_parcela, [], function (tx, resultado){
            var rows = resultado.rows;
                
            for(var h = 0; h < rows.length; h++){
                id_bloco = rows[h].bloco;
            }

            tx.executeSql("SELECT*FROM blocos WHERE id_bloco="+id_bloco, [], function (tx, resultado){
                var rows = resultado.rows;
                   
                for(var j = 0; j < rows.length; j++){
                    qntP = rows[j].qntP;
                    qntPP = qntP-1;
                }

                tx.executeSql("DELETE FROM parcelas WHERE id_parcela="+id_parcela);
                
                tx.executeSql("UPDATE blocos SET qntP=? WHERE id_bloco=?", [qntPP, id_bloco],null);

                tx.executeSql("SELECT*FROM blocos WHERE qntP=1", [], function (tx, resultado){
                    var rows = resultado.rows;
                       
                    for(var i = 0; i < rows.length; i++){
                        id_bloco = rows[i].id_bloco; 
                        tx.executeSql("UPDATE parcelas SET bloco=? WHERE bloco=?", ['', id_bloco],null);
                    }

                });    

                tx.executeSql("DELETE FROM blocos WHERE qntP=1");

            });
        });
    });

    addParcela();
    addBloco();
}

function salvarEletro(id_planta, id_parcela, eletro){
    db.transaction(function(tx) {

        tx.executeSql("SELECT * FROM parcelas WHERE id_planta="+id_planta+" AND id_parcela="+id_parcela+"", [], function (tx, resultado) {
            var rows = resultado.rows;
            imgE = '';

            for(var q = 0; q < rows.length; q++){
                eletro = rows[q].eletro
            }

            // tx.executeSql("UPDATE parcelas SET eletro=? WHERE id_parcela=?", ['img/imgspng/eletrovalvula.png', id_parcela],null);

            if(eletro == ''){
                tx.executeSql("UPDATE parcelas SET eletro=? WHERE id_parcela=?", ['../img/imgspng/eletrovalvula.png', id_parcela],null);
            }
            else{
                tx.executeSql("UPDATE parcelas SET eletro='' WHERE id_parcela=?", [id_parcela],null);
            }
            
        });
    });
    addEletro();
}


function addBlocoModal(id_planta, id_parcela){
    console.log(id_planta,id_parcela)
    db.transaction(function(tx) {
        tx.executeSql('SELECT * FROM plantas WHERE id_planta='+id_planta, [], function (tx, resultado) {
            var rows = resultado.rows;
            var ul = '';
            for(var i = 0; i < rows.length; i++){
                id_planta = rows[i].id_planta;
                cor = rows[i].cor;
            }

            tx.executeSql("SELECT*FROM blocos WHERE id_planta="+id_planta, [], function (tx, resultado){
                var rows = resultado.rows;
                var divBM = '';
                var texto = '';

                var modal_blocos = document.getElementById("modal_blocos");
                var textoModal = document.getElementById("textoModal");

                texto += "<b class='light-green-text'>Agrupar a um bloco:</b>";
                
                for(var j = 0; j < rows.length; j++){
                    id_bloco = rows[j].id_bloco;
                    divBM += "<a onclick='agrupar("+id_parcela+','+id_bloco+")' class='btn' style='margin-left:10px; margin-top:10px; background:"+cor+"'>Bloco "+id_bloco+"</a>";
                }
                modal_blocos.innerHTML = divBM;
                textoModal.innerHTML = texto;
            });
        });
    });
}

function trocarBloco(id_planta, id_parcela, bloco){
    // console.log(id_planta, id_parcela, bloco)
    db.transaction(function(tx) {
        tx.executeSql('SELECT * FROM plantas WHERE id_planta='+id_planta, [], function (tx, resultado) {
            var rows = resultado.rows;
            var divBM = '';
            var texto = '';

            for(var i = 0; i < rows.length; i++){
                id_planta = rows[i].id_planta;
                cor = rows[i].cor;
            }

            tx.executeSql("SELECT*FROM blocos WHERE id_planta="+id_planta+' AND id_bloco!='+bloco, [], function (tx, resultado){
                var rows = resultado.rows;
                var divBM = '';
                
                var modal_blocos = document.getElementById("modal_blocos");
                var textoModal = document.getElementById("textoModal");

                texto += "<b class='light-green-text'>Agrupar a outro Bloco:</b>";
                divBM += "<a onclick='desagrupar("+id_parcela+")' class='btn' style='margin-left:10px; background:#ccc'>Desagrupar</a>";

                for(var j = 0; j < rows.length; j++){
                    id_bloco = rows[j].id_bloco;
                    divBM += "<a onclick='agrupar("+id_parcela+','+id_bloco+")' class='btn' style='margin-left:10px; background:"+cor+"'>Bloco "+id_bloco+"</a>";
                }


                modal_blocos.innerHTML = divBM;
                textoModal.innerHTML = texto;
            });
        });
    });
}

function agrupar(id_parcela, id_bloco){
    db.transaction(function(tx){
        tx.executeSql('SELECT * FROM parcelas WHERE id_parcela=?',[id_parcela], function(tx, resultado){

            tx.executeSql("UPDATE parcelas SET bloco=? WHERE id_parcela=?", [id_bloco, id_parcela],null);
        });

        tx.executeSql('SELECT * FROM blocos WHERE id_bloco=?',[id_bloco], function(tx, resultado){
            rows = resultado.rows;
            for(var g = 0; g < rows.length; g++){
                qntP = rows[g].qntP;
                qntPP = qntP+1;
            }
            
            tx.executeSql("UPDATE blocos SET qntP=? WHERE id_bloco=?", [qntPP, id_bloco],null);
        });
    });
    addParcela();
    addBloco();
}

function desagrupar(id_parcela){

    db.transaction(function(tx){
        tx.executeSql('SELECT * FROM parcelas WHERE id_parcela=?',[id_parcela], function(tx, resultado){
            rows = resultado.rows;
            for(var h = 0; h < rows.length; h++){
                bloco = rows[h].bloco;
            }

            tx.executeSql("UPDATE parcelas SET bloco=? WHERE id_parcela=?", ['', id_parcela],null);

        tx.executeSql('SELECT * FROM blocos WHERE id_bloco=?',[bloco], function(tx, resultado){
            rows = resultado.rows;
            for(var g = 0; g < rows.length; g++){
                qntP = rows[g].qntP;
                qntPP = qntP-1;
            }
            
            tx.executeSql("UPDATE blocos SET qntP=? WHERE id_bloco=?", [qntPP, bloco],null);
            tx.executeSql("SELECT*FROM blocos WHERE qntP=1", [], function (tx, resultado){
                var rows = resultado.rows;
                   
                for(var i = 0; i < rows.length; i++){
                    id_bloco = rows[i].id_bloco; 
                    tx.executeSql("UPDATE parcelas SET bloco=? WHERE bloco=?", ['', id_bloco],null);
                }
    
            });    
    
            tx.executeSql("DELETE FROM blocos WHERE qntP=1");
        });
        
    });
    });
    addParcela();
    addBloco();
}

function addEletro(id_planta, id_parcela){
    db.transaction(function(tx) {
        tx.executeSql('SELECT * FROM plantas WHERE id_planta='+id_planta, [], function (tx, resultado) {
            var rows = resultado.rows;
            var ul = '';
            for(var i = 0; i < rows.length; i++){
                id_planta = rows[i].id_planta;
                cor = rows[i].cor;
            }

            tx.executeSql("SELECT*FROM blocos WHERE id_planta="+id_planta, [], function (tx, resultado){
                var rows = resultado.rows;

                for(var e = 0; e < rows.length; e++){
                    id_planta = rows[e].id_planta;
                }
            });
            tx.executeSql("SELECT*FROM blocos WHERE qntP=1", [], function (tx, resultado){
                var rows = resultado.rows;
                var divB = '';
                   
                for(var i = 0; i < rows.length; i++){
                    id_bloco = rows[i].id_bloco; 
                    tx.executeSql("UPDATE parcelas SET bloco=? WHERE bloco=?", ['', id_bloco],null);
                }
                
            });    
            tx.executeSql("DELETE FROM blocos WHERE qntP=1");
        });
    });

    addParcela();
    addBloco();   
}

