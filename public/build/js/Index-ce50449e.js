import{L as P,r as x,o as a,c as n,d as e,e as w,w as b,f,b as p,F as y,k as F,n as S,a as k,t as d,H as V,C as O,g as B,h,v,l as I,j as L}from"./app-a0cdcb17.js";import{_ as C}from"./_plugin-vue_export-helper-c27b6911.js";import{F as M,a as c}from"./pt-br-5cae06a5.js";import{f as N,a as E}from"./funcoes-a27e3e33.js";const D={name:"Pagination",components:{Link:P},props:{data:Object},computed:{cleanLinks(){const t=[...this.data.links];return t.shift(),t.pop(),t}}},U={"aria-label":"Page navigation"},q={class:"pagination"},A={class:"page-item active"},T={class:"page-item active"};function z(t,o,l,u,r,i){const _=x("Link");return a(),n("nav",U,[e("ul",q,[e("li",A,[l.data.prev_page_url?(a(),w(_,{key:0,href:l.data.prev_page_url,class:"page-link","preserve-state":"","preserve-scroll":""},{default:b(()=>[f(" Voltar ")]),_:1},8,["href"])):p("",!0)]),(a(!0),n(y,null,F(i.cleanLinks,m=>(a(),n("li",{class:S(["page-item",{active:m.active}]),key:m.label},[k(_,{href:m.url,class:"page-link","preserve-state":"","preserve-scroll":""},{default:b(()=>[f(d(m.label),1)]),_:2},1032,["href"])],2))),128)),e("li",T,[l.data.next_page_url?(a(),w(_,{key:0,href:l.data.next_page_url,class:"page-link","preserve-state":"","preserve-scroll":""},{default:b(()=>[f("Próximo")]),_:1},8,["href"])):p("",!0)])])])}const H=C(D,[["render",z]]),R={name:"Convenio/Index",components:{Pagination:H,FlashMessage:M,Head:V,Link:P,vSelect:O},props:{convenios:Object,filtro:Object,errors:Object,flash:Object,auth:Object},data(){return{alertas:c,contratos:[],orgaos:[],enviandoForm:!1,form:{numero:"",objeto:"",numero_processo:"",valor_repasse:"",valor_contra_partida:"",valor_total:"",valor_liberado_concedente:"",valor_pago:"",valor_liberado:"",virgencia:"",virgencia_prestacao_contas:"",contrato_id:"",orgao_id:""},formFiltro:{numero:"",virgencia:"",virgenciaPrestacaoContas:"",contratoId:"",orgaoId:""}}},created(){},computed:{ocultarPaginacao(){return!this.convenios.prev_page_url&&!this.convenios.next_page_url},temFiltro(){return Object.values(this.formFiltro).some(t=>t!==""&&t!==null)}},mounted(){this.$nextTick(()=>{try{axios.get(route("contratos.lista")).then(t=>this.contratos=t.data)}catch(t){c.toastr("Ops! tem algo de errado",t,"error"),console.log(t)}try{axios.get(route("orgaos.lista")).then(t=>this.orgaos=t.data)}catch(t){c.toastr("Ops! tem algo de errado",t,"error"),console.log(t)}})},methods:{formatarDataPtBr:N,formatarMoedaPtBr:E,buscar(){this.enviandoForm=!0,c.loading("pesquisando...");const t={};for(const o in this.formFiltro)this.formFiltro[o]!==""&&this.formFiltro[o]!==null&&(t[o]=this.formFiltro[o]);this.$inertia.visit(route("convenios.index"),{method:"get",data:t,preserveScroll:!0,preserveState:!0,onSuccess:()=>{c.close(),this.enviandoForm=!1},onError:o=>{for(let[l,u]of Object.entries(o))c.toastr(u,l,"error")},onFinish:()=>{c.close(),this.enviandoForm=!1}})},salvar(){this.form.put(route("user-password.update"),{errorBag:"updatePassword",preserveScroll:!0,onSuccess:()=>this.form.reset(),onError:()=>{}})},async deletar(t){const{isConfirmed:o}=await c.confirm("Deseja confirmar a exclusão?");if(!o)return;c.loading("processando...");const l=route("convenios.destroy",t.id);this.$inertia.visit(l,{method:"delete",data:t,preserveScroll:!0,preserveState:!0,onSuccess:()=>{c.toastr("Removido com sucesso",t.numero,"success")},onError:u=>{for(let[r,i]of Object.entries(u))c.toastr(i,r,"error")},onFinish:()=>{c.close()}})},async limpaPesquisa(){this.formFiltro={numero:"",virgencia:"",virgenciaPrestacaoContas:"",contratoId:"",orgaoId:""},this.$inertia.visit(route("convenios.index"))},closeModal(){this.confirmingUserDeletion=!1,this.form.reset()}}},G={class:"container-fluid p-0"},J=e("h1",{class:"h3 mb-3"},"Convênios",-1),K={class:"row"},Q={class:"col-xl-12"},W={class:"card"},X={class:"card-header pb-0"},Y=L('<div class="-actions float-end"><div class="dropdown position-relative"><a href="#" data-bs-toggle="dropdown" data-bs-display="static"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div></div></div>',1),Z={class:"row"},$={class:"col-2 mb-3"},ee=e("label",{for:"virgencia"},"Virgência",-1),te={class:"col-2 mb-3"},oe=e("label",{for:"virgenciaPrestacaoContas"},"Virgência",-1),se={class:"col-2 mb-3"},re=e("label",{for:"numero"},"Nº Convênio",-1),ae={class:"col-2 mb-3"},ne=e("label",{for:"numero_processo"},"Nº Processo",-1),le={class:"col-3 mb-3"},ie=e("label",{for:"orgao_id"},"Orgão: ",-1),ce=e("option",{value:"0",selected:""},"-Selecione-",-1),de=["value","selected"],me={class:"ms-auto text-end mt-n1"},ue={class:"row no-print"},_e={class:"col-12"},he=["disabled"],fe={key:0,class:"spinner-border spinner-border-sm",role:"status","aria-hidden":"true"},ve={key:1,class:"fa-solid fa-magnifying-glass"},pe={key:2},ge={key:3},be=e("i",{class:"fa-solid fa-eraser"},null,-1),xe={class:"card-body"},ye={class:"table table-responsive table-striped table-hover","aria-describedby":"listaConvenio"},Fe=e("thead",null,[e("tr",null,[e("th",{class:"d-none d-md-table-cell text-center"},"Nº Processo "),e("th",{class:"d-none d-md-table-cell text-center"},"Nº Convênio"),e("th",null,"Objeto"),e("th",{class:"d-none d-md-table-cell text-center"},"Valor liberado"),e("th",{class:"d-none d-md-table-cell text-center"},"Virgência"),e("th",{class:"d-none d-md-table-cell text-center"},"Prestação de contas"),e("th",null,"Ações")])],-1),ke={class:"d-none d-md-table-cell"},we={class:"d-none d-md-table-cell text-nowrap"},Pe={class:"d-none d-md-table-cell text-center"},Ce={class:"d-none d-md-table-cell text-center"},je={class:"d-none d-md-table-cell text-center"},Se={class:"text-nowrap"},Ve=e("i",{class:"fas fa-edit fa-1x"},null,-1),Oe=[Ve],Be=["onClick"],Ie=e("i",{class:"fas fa-trash fa-1x"},null,-1),Le=[Ie],Me={key:0},Ne={colspan:"6"};function Ee(t,o,l,u,r,i){const _=x("FlashMessage"),m=x("Pagination");return a(),n("div",G,[k(_,{flash:l.flash},null,8,["flash"]),J,e("div",K,[e("div",Q,[e("div",W,[e("div",X,[Y,e("form",{autocomplete:"on",novalidate:"",class:"mb-3",onSubmit:o[6]||(o[6]=B(s=>i.buscar(),["prevent"]))},[e("div",Z,[e("div",$,[ee,h(e("input",{type:"date",class:"form-control","onUpdate:modelValue":o[0]||(o[0]=s=>r.formFiltro.virgencia=s)},null,512),[[v,r.formFiltro.virgencia]])]),e("div",te,[oe,h(e("input",{type:"date",class:"form-control","onUpdate:modelValue":o[1]||(o[1]=s=>r.formFiltro.virgenciaPrestacaoContas=s)},null,512),[[v,r.formFiltro.virgenciaPrestacaoContas]])]),e("div",se,[re,h(e("input",{type:"text",class:"form-control","onUpdate:modelValue":o[2]||(o[2]=s=>r.formFiltro.numero=s)},null,512),[[v,r.formFiltro.numero]])]),e("div",ae,[ne,h(e("input",{type:"text",class:"form-control","onUpdate:modelValue":o[3]||(o[3]=s=>r.formFiltro.numero_processo=s)},null,512),[[v,r.formFiltro.numero_processo]])]),e("div",le,[ie,h(e("select",{class:"form-control","onUpdate:modelValue":o[4]||(o[4]=s=>r.formFiltro.orgaoId=s)},[ce,(a(!0),n(y,null,F(r.orgaos,(s,g)=>(a(),n("option",{key:g,value:s.id,selected:r.formFiltro.orgaoId===s.id},d(s.nome),9,de))),128))],512),[[I,r.formFiltro.orgaoId]])])]),e("div",me,[e("div",ue,[e("div",_e,[e("button",{type:"submit",class:"btn btn-primary btns-no-actions m-1",disabled:r.enviandoForm},[r.enviandoForm?(a(),n("span",fe)):(a(),n("i",ve)),r.enviandoForm?(a(),n("span",ge," Pesquisando... ")):(a(),n("span",pe," Pesquisar "))],8,he),i.temFiltro?(a(),n("button",{key:0,type:"button",class:"btn btn-secondary btns-no-actions m-0",onClick:o[5]||(o[5]=s=>i.limpaPesquisa())},[be,f(" Limpar ")])):p("",!0)])])])],32)]),e("div",xe,[e("table",ye,[Fe,e("tbody",null,[(a(!0),n(y,null,F(l.convenios.data,(s,g)=>(a(),n("tr",{key:g},[e("td",ke,d(s.numero),1),e("td",we,d(s.numero_processo),1),e("td",null,[f(d(s.objeto)+" ",1),e("p",null,[e("small",null,d(s.orgao.nome),1)])]),e("td",Pe,d(i.formatarMoedaPtBr(s.valor_liberado)),1),e("td",Ce,d(i.formatarDataPtBr(s.virgencia)),1),e("td",je,d(i.formatarDataPtBr(s.virgencia_prestacao_contas)),1),e("td",Se,[e("a",{href:"javascript:void(0);",onClick:o[7]||(o[7]=j=>t.notyf()),class:"btn btn-sm btn-info","data-toggle":"tooltip","data-placement":"top",title:"Excluir","data-original-title":"Excluir"},Oe),e("a",{href:"javascript:void(0);",onClick:j=>i.deletar(s),"data-toggle":"tooltip","data-placement":"top",title:"Excluir","data-original-title":"Excluir",class:"btn btn-sm btn-danger"},Le,8,Be)])]))),128))]),i.ocultarPaginacao?p("",!0):(a(),n("tfoot",Me,[e("tr",null,[e("td",Ne,[e("div",null,[k(m,{data:l.convenios},null,8,["data"])])])])]))])])])])])])}const Te=C(R,[["render",Ee]]);export{Te as default};
//# sourceMappingURL=Index-ce50449e.js.map
