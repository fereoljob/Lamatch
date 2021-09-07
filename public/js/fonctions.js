function editionCompe()
{
    let selectCompe = document.querySelector("select[name='newCompe[]']");
    for(let sel of selectCompe.options)
    {
        if(!(sel.disabled==true))
        {
            sel.addEventListener('click',function(e){
                let selectCompe = document.querySelector("select[name='newCompe[]']");
                for(let theone of selectCompe.options)
                {
                    if(theone.value==e.target.value)
                    {
                        selectCompe.removeChild(theone);
                    }
                }
            });
        }
    }
}
function editionRegion()
{
    let selectReg = document.querySelector("select[name='newReg[]']");
    for(let sel of selectReg.options)
    {
        if(!(sel.disabled==true))
        {
            sel.addEventListener('click',function(e){
                let selectReg = document.querySelector("select[name='newReg[]']");
                for(let theone of selectReg.options)
                {
                    if(theone.value==e.target.value)
                    {
                        selectReg.removeChild(theone);
                    }
                }
            });
        }   
    }
}
function traitementAjouForma(tabmodifer)
{

    let modifFormabouts = document.querySelector(".AjoutFormaBut");
    $.each(modifFormabouts,function(key,value){
        value.addEventListener('click',function(e)
        {
            e.preventDefault();
            let verif = document.querySelector("div[class='formation_nouvelle'] div[class*='leform']");
            if(!verif)
            {
                let divgene = document.createElement("div");
                divgene.classList.add("leform");
                let ErrorSpan = document.querySelector("span");
                ErrorSpan.innerHTML="Renseigner tous les champs svp !!!";
                ErrorSpan.classList.add("text-danger","error_displaying");
                ErrorSpan.style.display="none";
                divgene.classList.add("row");
                let divcard = document.createElement("div");
                divcard.classList.add("col-12","card","study");
                let pcardtitle = document.createElement("p");
                pcardtitle.classList.add("card-title");
                let inputOfp = document.createElement("input");
                inputOfp.type="text";
                inputOfp.classList.add("form-control","w-25");
                inputOfp.placeholder = "Intitulé formation...";
                inputOfp.name="intitule_forma";
                let divinfoforma = document.createElement("div");
                divinfoforma.classList.add("study-infos","infos-inline","row");
                let span_date = document.createElement("span");
                let span_level = document.createElement("span");
                let span_city = document.createElement("span");
                let span_domaine = document.createElement("span");
                let input_date_deb_forma = document.createElement("input");
                input_date_deb_forma.type = "date";
                input_date_deb_forma.name= "date_debut";
                input_date_deb_forma.dataToggle ="tooltip";
                input_date_deb_forma.dataPlacement ="top"
                input_date_deb_forma.classList.add("form-control");
                input_date_deb_forma.title="Date début formation";
                let input_date_fin_forma = document.createElement("input");
                input_date_fin_forma.type = "date";
                input_date_fin_forma.name= "date_fin";
                input_date_fin_forma.dataToggle ="tooltip";
                input_date_fin_forma.classList.add("form-control")
                input_date_fin_forma.dataPlacement ="top";
                input_date_fin_forma.title="Date fin formation";
                let input_level = document.createElement("select");
                input_level.classList.add("form-control");
                let op1 = document.createElement("option");
                op1.innerHTML="--- Choisir niveau d'étude ---";
                op1.disabled="disabled";
                let op2 = document.createElement("option");
                op2.innerHTML = "Bac";
                op2.value="Bac";
                let op3 = document.createElement("option");
                op3.innerHTML = "Bac + 2";
                op3.value="Bac + 2";
                let op4 = document.createElement("option");
                op4.innerHTML = "Bac + 3";
                op4.value="Bac + 3";
                let op5 = document.createElement("option");
                op5.innerHTML = "Bac + 5";
                op5.value="Bac + 5";
                let op6 = document.createElement("option");
                op6.innerHTML = "Bac + 8";
                op6.value="Bac + 8";
                input_level.add(op1);
                let ops = document.createElement("option");
                ops.innerHTML = "< Bac";
                ops.value="< Bac";
                input_level.add(ops);
                input_level.add(op2);
                input_level.add(op3);
                input_level.add(op4);
                input_level.add(op5);
                input_level.add(op6);
                input_level.name="niv_etude";
                let input_city = document.createElement("input");
                input_city.type="text";
                input_city.classList.add("form-control");
                input_city.placeholder = "Ville...";
                input_city.name="ville";
                let input_pays = document.createElement("input");
                input_pays.type="text";
                input_pays.classList.add("form-control","ms-3");
                input_pays.placeholder = "Pays...";
                input_pays.name="Pays";
                let input_domain = document.createElement("input");
                input_domain.type="text";
                input_domain.classList.add("form-control");
                input_domain.placeholder = "Domaine...";
                input_domain.name="domaine";
                let pdescription = document.createElement("p");
                pdescription.classList.add("mt-5");
                let input_description = document.createElement("textarea");
                input_description.placeholder="Entrez une description";
                let divAjout = document.createElement("div");
                divAjout.classList.add("row");
                let divcolbou = document.createElement("div");
                divcolbou.classList.add("col-12","actions");
                let boutAjou = document.createElement("button");
                boutAjou.innerHTML="Ajouter Formation";
                boutAjou.classList.add("button","blue1","validForma");
                divgene.appendChild(divcard);
                divcard.appendChild(ErrorSpan);
                ErrorSpan.classList.add("m-3");
                divcard.appendChild(pcardtitle); 
                pcardtitle.appendChild(inputOfp);
                divcard.appendChild(divinfoforma);
                let span_date_gen = document.createElement("span");
                span_date_gen.classList.add("col-md-4","m-2");
                span_date.classList.add("col-md-4");
                span_date.append(input_date_deb_forma);
                let span_date2 = document.createElement("span");
                span_date2.classList.add("col-md-4");
                span_date2.appendChild(input_date_fin_forma);
                span_date_gen.appendChild(span_date);
                span_date_gen.appendChild(span_date2);
                divinfoforma.appendChild(span_date_gen);
                divinfoforma.append(span_level);
                span_level.classList.add("col-md-1","m-2");
                span_level.append(input_level)
                divinfoforma.appendChild(span_city)
                span_city.classList.add("col-md-2","m-2");
                span_city.appendChild(input_city);

                let span_pays = document.createElement("span");
                divinfoforma.appendChild(span_pays);
                span_pays.classList.add("col-md-2","m-2")
                span_pays.appendChild(input_pays);

                divinfoforma.appendChild(span_domaine);
                span_domaine.classList.add("col-md-2","m-2");
                span_domaine.appendChild(input_domain);
                divcard.appendChild(pdescription);
                pdescription.appendChild(input_description);
                divcard.appendChild(divAjout);
                divAjout.appendChild(divcolbou);
                let boutAnnuler = document.createElement("button");
                boutAnnuler.innerHTML = "Annuler";
                boutAnnuler.classList.add("button","AnnulerAjout","danger","ms-3"); 
                boutAnnuler.addEventListener('click',function(e){
                    e.preventDefault();
                    let divformu = document.querySelector(".formation_nouvelle");
                    divformu.replaceChild(document.createElement("p"),divformu.childNodes[0]);
                });
                divcolbou.appendChild(boutAjou);
                divcolbou.appendChild(boutAnnuler);
                boutAjou.addEventListener('click',function(e){
                    e.preventDefault();
                    let champs_ren=true;
                    let les_champs_input = document.querySelectorAll("div[class='formation_nouvelle'] input");
                    for(let elem of les_champs_input)
                    {
                        if(elem.value=="")
                        {
                            let error_champ = document.querySelector(".error_displaying");
                            error_champ.style.display = "inline";
                            champs_ren=false
                            break;
                        }
                    }
                    if(champs_ren==true)
                    {
                        let titlespan = document.createElement("span");
                        titlespan.innerHTML = inputOfp.value;
                        pcardtitle.replaceChild(titlespan,inputOfp);
                        let datedebut = document.createTextNode(input_date_deb_forma.value);
                        let datefin = document.createTextNode(input_date_fin_forma.value);
                        span_date.remove();
                        span_date2.remove();
                        span_date_gen.append(document.createTextNode("📅 "+datedebut.nodeValue+" - "+datefin.nodeValue));
                        let niv = document.createTextNode(input_level.options[input_level.options.selectedIndex].value);
                        input_level.remove();
                        span_level.append(document.createTextNode("👨‍🎓 "+niv.nodeValue));
                        let tower = document.createTextNode(input_city.value);
                        let country = document.createTextNode(input_pays.value);
                        let domaine = document.createTextNode(input_domain.value);
                        input_city.remove();
                        input_pays.remove();
                        input_domain.remove();
                        span_city.append(document.createTextNode("🚩 "+tower.nodeValue+" - "+country.nodeValue));
                        span_pays.remove();
                        span_domaine.append(document.createTextNode("💼 "+domaine.nodeValue));
                        let descri = document.createTextNode(input_description.value);
                        input_description.remove();
                        pdescription.innerHTML = descri.nodeValue;
                        let changementP = document.querySelector("div[class*='les_formations']");
                        changementP.insertBefore(divgene,changementP.firstChild);
                        ErrorSpan.remove();
                        boutAjou.remove();
                        boutAnnuler.remove();
                        let boutSup = document.createElement("button");
                        boutSup.innerHTML = "🚽 Supprimer";
                        let id_ch_fo = changementP.childElementCount+1;
                        boutSup.classList.add("button","danger","ms-3",id_ch_fo);
                        boutSup.addEventListener('click',function(e){
                            e.preventDefault();
                            let id = e.target.classList[3];
                            divgene.style.display = "none";
                            tabmodifer[id]="";
                        });
                        divcolbou.append(boutSup);
                        let obj = {"candidat":le_candi,"intitule_forma":titlespan.innerHTML,"date_debut":datedebut.nodeValue
                        ,"date_fin":datefin.nodeValue,"level":niv.nodeValue,"ville":tower.nodeValue,"pays":country.nodeValue,
                        "domain":domaine.nodeValue,"description":descri.nodeValue,"numero_form":id_ch_fo};
                        tabmodifer[id_ch_fo]=obj;
                    }
                });
                let divformu = document.querySelector(".formation_nouvelle");
                divformu.replaceChild(divgene,divformu.childNodes[0]);
            }
        });
    });
}