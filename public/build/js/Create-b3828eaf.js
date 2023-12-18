import{F as k,a as f}from"./pt-br-5cae06a5.js";import{H as x,L as V,r as v,o as t,c as l,d as o,a as b,h as n,v as d,n as m,t as _,b as i,w as C,g as N,i as S,f as c,j as E}from"./app-a0cdcb17.js";import{_ as j}from"./_plugin-vue_export-helper-c27b6911.js";const w={name:"Convenio/Create",components:{FlashMessage:k,Head:x,Link:V},props:{convenios:Object,errors:Object,flash:Object,auth:Object},data(){return{botaoEnviar:!1,form:{id:null,numero:null,objeto:null,numero_processo:null,valor_repasse:null,valor_contra_partida:null,valor_total:null,valor_liberado_concedente:null,valor_pago:null,valor_liberado:null,virgencia:null,virgencia_prestacao_contas:null,contrato_id:null,orgao_id:null}}},created(){},computed:{},mounted(){},methods:{async salvar(){this.botaoEnviar=!0,f.loading("Aguarde...");let u="post",r=route("convenios.store");this.form.id&&(u="put",r=route("convenios.update",this.form.id)),this.$inertia.visit(r,{method:u,data:this.form,preserveScroll:!0,preserveState:!0,onSuccess:()=>{f.toastr("Salvo com sucesso!",this.form.numero,"success")},onError:e=>{for(let[p,s]of Object.entries(e))f.toastr("",s,"error")},onFinish:()=>{this.botaoEnviar=!1,f.close()}})}}},q={class:"p-0 container-fluid"},A=o("h1",{class:"mb-3 h3"},"Novo convênios",-1),F={class:"card"},M=o("div",{class:"card-header"},null,-1),O={class:"card-body"},U={class:"row"},D={class:"mb-3 col-md-3"},L={class:"mb-3 form-floating"},B=o("label",{for:"numero"},[c("Número "),o("span",{class:"text-danger"},"*")],-1),P={key:0,class:"invalid-feedback"},Z={class:"mb-3 col-md-3"},H={class:"mb-3 form-floating"},T=o("label",{class:"form-label",for:"numero_processo"},[c("Número do processo: "),o("span",{class:"text-danger"},"*")],-1),z={key:0,class:"invalid-feedback"},G={class:"mb-3 col-md-3"},I={class:"mb-3 form-floating"},J=o("label",{class:"form-label",for:"virgencia"},[c("Virgência: "),o("span",{class:"text-danger"},"*")],-1),K={key:0,class:"invalid-feedback"},Q={class:"mb-3 col-md-3"},R={class:"mb-3 form-floating"},W=o("label",{class:"form-label",for:"virgencia_prestacao_contas"},[c("Virgência prestação contas: "),o("span",{class:"text-danger"},"*")],-1),X={key:0,class:"invalid-feedback"},Y={class:"mb-3 col-md-2"},$={class:"mb-3 form-floating"},oo=o("label",{class:"form-label",for:"virgencia_prestacao_contas"},[c("Virgência prestação contas: "),o("span",{class:"text-danger"},"*")],-1),eo={key:0,class:"invalid-feedback"},so=E('<div class="mb-3 col-md-2"><label class="form-label" for="inputAddress2">Address 2</label><input type="text" class="mb-3 form-control form-control-lg" id="inputAddress2" placeholder="Apartment, studio, or floor"></div><div class="row"><div class="mb-3 col-md-6"><label class="form-label" for="inputCity">City</label><input type="text" class="mb-3 form-control form-control-lg" id="inputCity"></div><div class="mb-3 col-md-4"><label class="form-label" for="inputState">State</label><select id="inputState" class="mb-3 form-control form-control-lg"><option selected="">Choose...</option><option>...</option></select></div><div class="mb-3 col-md-2"><label class="form-label" for="inputZip">Zip</label><input type="text" class="mb-3 form-control form-control-lg" id="inputZip"></div></div><div class="mb-3"><label class="form-label"><input type="checkbox" class="form-check-input"><span class="form-check-label">Check me out</span></label></div>',3),ro={class:"modal-footer"},ao=o("i",{class:"fas fa-sign-in-alt"},null,-1),to=["disabled"],lo={class:"far fa-save"},no={key:0,class:"spinner-border spinner-border-sm text-info me-2",role:"status","aria-hidden":"true"},io={key:1},co={key:2};function mo(u,r,e,p,s,h){const g=v("FlashMessage"),y=v("Link");return t(),l("div",q,[o("div",null,[b(g,{flash:e.flash},null,8,["flash"])]),A,o("div",F,[M,o("div",O,[o("form",null,[o("div",U,[o("div",D,[o("div",L,[n(o("input",{type:"text",class:m(["mb-3 form-control",{"is-invalid":e.errors.numero}]),required:"","onUpdate:modelValue":r[0]||(r[0]=a=>s.form.numero=a),ref:"refNumero",placeholder:"Nº "},null,2),[[d,s.form.numero]]),B,e.errors.numero?(t(),l("div",P,_(e.errors.numero),1)):i("",!0)])]),o("div",Z,[o("div",H,[n(o("input",{type:"text",class:m(["mb-3 form-control",{"is-invalid":e.errors.numero_processo}]),required:"","onUpdate:modelValue":r[1]||(r[1]=a=>s.form.numero_processo=a),ref:"refNumeroProcesso",placeholder:"Nº "},null,2),[[d,s.form.numero_processo]]),T,e.errors.numero_processo?(t(),l("div",z,_(e.errors.numero_processo),1)):i("",!0)])]),o("div",G,[o("div",I,[n(o("input",{type:"date",class:m(["mb-3 form-control",{"is-invalid":e.errors.virgencia}]),required:"","onUpdate:modelValue":r[2]||(r[2]=a=>s.form.virgencia=a),ref:"refVirgencia",placeholder:"Nº "},null,2),[[d,s.form.virgencia]]),J,e.errors.virgencia?(t(),l("div",K,_(e.errors.virgencia),1)):i("",!0)])]),o("div",Q,[o("div",R,[n(o("input",{type:"date",class:m(["mb-3 form-control",{"is-invalid":e.errors.virgencia_prestacao_contas}]),required:"","onUpdate:modelValue":r[3]||(r[3]=a=>s.form.virgencia_prestacao_contas=a),ref:"refVirgenciaPrestacaoContas",placeholder:"Data "},null,2),[[d,s.form.virgencia_prestacao_contas]]),W,e.errors.virgencia_prestacao_contas?(t(),l("div",X,_(e.errors.virgencia_prestacao_contas),1)):i("",!0)])])]),o("div",Y,[o("div",$,[n(o("input",{type:"date",class:m(["mb-3 form-control",{"is-invalid":e.errors.virgencia_prestacao_contas}]),required:"","onUpdate:modelValue":r[4]||(r[4]=a=>s.form.virgencia_prestacao_contas=a),ref:"refVirgenciaPrestacaoContas",placeholder:"Data "},null,2),[[d,s.form.virgencia_prestacao_contas]]),oo,e.errors.virgencia_prestacao_contas?(t(),l("div",eo,_(e.errors.virgencia_prestacao_contas),1)):i("",!0)])]),so,o("div",ro,[b(y,{href:u.route("convenios.index"),class:"btn btn-secondary"},{default:C(()=>[ao,c(" Sair ")]),_:1},8,["href"]),o("button",{onClick:r[5]||(r[5]=N(a=>h.salvar(),["prevent"])),class:"m-1 btn btn-primary",disabled:s.botaoEnviar},[n(o("i",lo,null,512),[[S,!s.botaoEnviar]]),s.botaoEnviar?(t(),l("span",no)):i("",!0),s.botaoEnviar?(t(),l("span",co," Enviando... ")):(t(),l("span",io," Salvar "))],8,to)])])])])])}const vo=j(w,[["render",mo]]);export{vo as default};
//# sourceMappingURL=Create-b3828eaf.js.map