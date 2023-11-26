/* empty css              */let p,nt,i,o,m,_,M,T,E,A,F,V,w,it,b,S,B,W,D,N,$,Y;const G=[];let P,j,O,J,R,X,a,l,H,k={},q,u;const s="appendChild",d="createElement",y="removeChild",lt=t=>(nt||ct(t),w&&(clearTimeout(it),et()),u=t,V=t.ytSrc||t.vimeoSrc,j=t.animationStart,O=t.animationEnd,J=t.onChangeImage,p=t.el,P=!1,W=p.getAttribute("data-caption"),t.gallery?dt(t.gallery,t.position):V||t.iframeSrc?(o=T,pt()):t.imgSrc?(P=!0,A=t.imgSrc,!~G.indexOf(A)&&C(!0),o=m,o.src=A):t.audio?(C(!0),o=M,o.src=t.audio,Q("audio file")):t.vidSrc?(C(!0),t.dimensions&&f(_,`width:${t.dimensions[0]}px`),st(t.vidSrc),Q("video")):(o=m,o.src=p.tagName==="IMG"?p.src:window.getComputedStyle(p).backgroundImage.replace(/^url|[(|)|'|"]/g,"")),i[s](o),document.body[s](i),{close:Z,opts:u,updateDimensions:tt,display:o,next:()=>v(1),prev:()=>v(-1)});function ct(t){let e,n;function c(r){const x=document[d]("button");return x.className=r,x.innerHTML='<svg viewBox="0 0 48 48"><path d="M28 24L47 5a3 3 0 1 0-4-4L24 20 5 1a3 3 0 1 0-4 4l19 19L1 43a3 3 0 1 0 4 4l19-19 19 19a3 3 0 0 0 4 0v-4L28 24z"/></svg>',x}function g(r,x){const z=document[d]("button");return z.className="bp-lr",z.innerHTML='<svg viewBox="0 0 129 129" height="70" fill="#fff"><path d="M88.6 121.3c.8.8 1.8 1.2 2.9 1.2s2.1-.4 2.9-1.2a4.1 4.1 0 0 0 0-5.8l-51-51 51-51a4.1 4.1 0 0 0-5.8-5.8l-54 53.9a4.1 4.1 0 0 0 0 5.8l54 53.9z"/></svg>',f(z,x),z.onclick=at=>{at.stopPropagation(),v(r)},z}const h=document[d]("STYLE"),I=t&&t.overlayColor?t.overlayColor:"rgba(0,0,0,.7)";h.innerHTML=`#bp_caption,#bp_container{bottom:0;left:0;right:0;position:fixed;opacity:0}#bp_container>*,#bp_loader{position:absolute;right:0;z-index:10}#bp_container,#bp_caption,#bp_container svg{pointer-events:none}#bp_container{top:0;z-index:9999;background:${I};opacity:0;transition:opacity .35s}#bp_loader{top:0;left:0;bottom:0;display:flex;align-items:center;cursor:wait;background:0;z-index:9}#bp_loader svg{width:50%;max-width:300px;max-height:50%;margin:auto;animation:bpturn 1s infinite linear}#bp_aud,#bp_container img,#bp_sv,#bp_vid{user-select:none;max-height:96%;max-width:96%;top:0;bottom:0;left:0;margin:auto;box-shadow:0 0 3em rgba(0,0,0,.4);z-index:-1}#bp_sv{background:#111}#bp_sv svg{width:66px}#bp_caption{font-size:.9em;padding:1.3em;background:rgba(15,15,15,.94);color:#fff;text-align:center;transition:opacity .3s}#bp_aud{width:650px;top:calc(50% - 20px);bottom:auto;box-shadow:none}#bp_count{left:0;right:auto;padding:14px;color:rgba(255,255,255,.7);font-size:22px;cursor:default}#bp_container button{position:absolute;border:0;outline:0;background:0;cursor:pointer;transition:all .1s}#bp_container>.bp-x{padding:0;height:41px;width:41px;border-radius:100%;top:8px;right:14px;opacity:.8;line-height:1}#bp_container>.bp-x:focus,#bp_container>.bp-x:hover{background:rgba(255,255,255,.2)}.bp-x svg,.bp-xc svg{height:21px;width:20px;fill:#fff;vertical-align:top;}.bp-xc svg{width:16px}#bp_container .bp-xc{left:2%;bottom:100%;padding:9px 20px 7px;background:#d04444;border-radius:2px 2px 0 0;opacity:.85}#bp_container .bp-xc:focus,#bp_container .bp-xc:hover{opacity:1}.bp-lr{top:50%;top:calc(50% - 130px);padding:99px 0;width:6%;background:0;border:0;opacity:.4;transition:opacity .1s}.bp-lr:focus,.bp-lr:hover{opacity:.8}@keyframes bpf{50%{transform:translatex(15px)}100%{transform:none}}@keyframes bpl{50%{transform:translatex(-15px)}100%{transform:none}}@keyframes bpfl{0%{opacity:0;transform:translatex(70px)}100%{opacity:1;transform:none}}@keyframes bpfr{0%{opacity:0;transform:translatex(-70px)}100%{opacity:1;transform:none}}@keyframes bpfol{0%{opacity:1;transform:none}100%{opacity:0;transform:translatex(-70px)}}@keyframes bpfor{0%{opacity:1;transform:none}100%{opacity:0;transform:translatex(70px)}}@keyframes bpturn{0%{transform:none}100%{transform:rotate(360deg)}}@media (max-width:600px){.bp-lr{font-size:15vw}}`,document.head[s](h),i=document[d]("DIV"),i.id="bp_container",i.onclick=Z,F=c("bp-x"),i[s](F),"ontouchend"in window&&window.visualViewport&&(q=!0,i.ontouchstart=({touches:r,changedTouches:x})=>{n=r.length>1,e=x[0].pageX},i.ontouchend=({changedTouches:r})=>{if($&&!n&&window.visualViewport.scale<=1){let x=r[0].pageX-e;x<-30&&v(1),x>30&&v(-1)}}),m=document[d]("IMG"),_=document[d]("VIDEO"),_.id="bp_vid",_.setAttribute("playsinline",!0),_.controls=!0,_.loop=!0,M=document[d]("audio"),M.id="bp_aud",M.controls=!0,M.loop=!0,H=document[d]("span"),H.id="bp_count",S=document[d]("DIV"),S.id="bp_caption",D=c("bp-xc"),D.onclick=K.bind(null,!1),S[s](D),B=document[d]("SPAN"),S[s](B),i[s](S),R=g(1,"transform:scalex(-1)"),X=g(-1,"left:0;right:auto"),b=document[d]("DIV"),b.id="bp_loader",b.innerHTML='<svg viewbox="0 0 32 32" fill="#fff" opacity=".8"><path d="M16 0a16 16 0 0 0 0 32 16 16 0 0 0 0-32m0 4a12 12 0 0 1 0 24 12 12 0 0 1 0-24" fill="#000" opacity=".5"/><path d="M16 0a16 16 0 0 1 16 16h-4A12 12 0 0 0 16 4z"/></svg>',T=document[d]("DIV"),T.id="bp_sv",E=document[d]("IFRAME"),E.setAttribute("allowfullscreen",!0),E.allow="autoplay; fullscreen",E.onload=()=>T[y](b),f(E,"border:0;position:absolute;height:100%;width:100%;left:0;top:0"),T[s](E),m.onload=L,m.onerror=L.bind(null,"image"),window.addEventListener("resize",()=>{$||w&&C(!0),o===T&&tt()}),document.addEventListener("keyup",({keyCode:r})=>{r===27&&N&&Z(),$&&(r===39&&v(1),r===37&&v(-1),r===38&&v(10),r===40&&v(-10))}),document.addEventListener("keydown",r=>{$&&~[37,38,39,40].indexOf(r.keyCode)&&r.preventDefault()}),document.addEventListener("focus",r=>{N&&!i.contains(r.target)&&(r.stopPropagation(),F.focus())},!0),nt=!0}function ot(){const{top:t,left:e,width:n,height:c}=p.getBoundingClientRect(),g=e-(i.clientWidth-n)/2,h=t-(i.clientHeight-c)/2,I=p.clientWidth/o.clientWidth,r=p.clientHeight/o.clientHeight;return`transform:translate3D(${g}px, ${h}px, 0) scale3D(${I}, ${r}, 0)`}function st(t){Array.isArray(t)?(o=_.cloneNode(),t.forEach(e=>{const n=document[d]("SOURCE");n.src=e,n.type=`video/${e.match(/.(\w+)$/)[1]}`,o[s](n)})):(o=_,o.src=t)}function dt(t,e){let n=u.galleryAttribute||"data-bp";if(Array.isArray(t))a=e||0,l=t,W=t[a].caption;else{l=[].slice.call(typeof t=="string"?document.querySelectorAll(`${t} [${n}]`):t);const c=l.indexOf(p);a=e===0||e?e:c!==-1?c:0,l=l.map(g=>({el:g,src:g.getAttribute(n),caption:g.getAttribute("data-caption")}))}P=!0,A=l[a].src,!~G.indexOf(A)&&C(!0),l.length>1?(i[s](H),H.innerHTML=`${a+1}/${l.length}`,q||(i[s](R),i[s](X))):l=!1,o=m,o.src=A}function v(t){const e=l.length-1;if(w)return;if(t>0&&a===e||t<0&&!a){if(!u.loop){f(m,""),setTimeout(f,9,m,`animation:${t>0?"bpl":"bpf"} .3s;transition:transform .35s`);return}a=t>0?-1:e+1}if(a=Math.max(0,Math.min(a+t,e)),[a-1,a,a+1].forEach(c=>{if(c=Math.max(0,Math.min(c,e)),k[c])return;const g=l[c].src,h=document[d]("IMG");h.addEventListener("load",rt.bind(null,g)),h.src=g,k[c]=h}),k[a].complete)return U(t);w=!0,f(b,"opacity:.4;"),i[s](b),k[a].onload=()=>{$&&U(t)},k[a].onerror=()=>{l[a]={error:"Error loading image"},$&&U(t)}}function U(t){w&&(i[y](b),w=!1);const e=l[a];if(e.error)alert(e.error);else{const n=i.querySelector("img:last-of-type");m=o=k[a],f(m,`animation:${t>0?"bpfl":"bpfr"} .35s;transition:transform .35s`),f(n,`animation:${t>0?"bpfol":"bpfor"} .35s both`),i[s](m),e.el&&(p=e.el)}H.innerHTML=`${a+1}/${l.length}`,K(l[a].caption),J&&J([m,l[a]])}function pt(){let t;const e="https://",n="autoplay=1";u.ytSrc?t=`${e}www.youtube${u.ytNoCookie?"-nocookie":""}.com/embed/${V}?html5=1&rel=0&playsinline=1&${n}`:u.vimeoSrc?t=`${e}player.vimeo.com/video/${V}?${n}`:u.iframeSrc&&(t=u.iframeSrc),f(b,""),T[s](b),E.src=t,tt(),setTimeout(L,9)}function tt(){let t,e;const n=window.innerHeight*.95,c=window.innerWidth*.95,g=n/c,[h,I]=u.dimensions||[1920,1080],r=I/h;r>g?(t=Math.min(I,n),e=t/r):(e=Math.min(h,c),t=e*r),T.style.cssText+=`width:${e}px;height:${t}px;`}function Q(t){~[1,4].indexOf(o.readyState)?(L(),setTimeout(()=>{o.play()},99)):o.error?L(t):it=setTimeout(Q,35,t)}function C(t){u.noLoader||(t&&f(b,`top:${p.offsetTop}px;left:${p.offsetLeft}px;height:${p.clientHeight}px;width:${p.clientWidth}px`),p.parentElement[t?s:y](b),w=t)}function K(t){t&&(B.innerHTML=t),f(S,`opacity:${t?"1;pointer-events:auto":"0"}`)}function rt(t){!~G.indexOf(t)&&G.push(t)}function L(t){if(w&&C(),j&&j(),typeof t=="string")return et(),u.onError?u.onError():alert(`Error: The requested ${t} could not be loaded.`);P&&rt(A),o.style.cssText+=ot(),f(i,"opacity:1;pointer-events:auto"),O&&(O=setTimeout(O,410)),N=!0,$=!!l,setTimeout(()=>{o.style.cssText+="transition:transform .35s;transform:none",W&&setTimeout(K,250,W)},60)}function Z(t){const e=t?t.target:i,n=[S,D,_,M,B,X,R,b];e.blur(),!(Y||~n.indexOf(e))&&(o.style.cssText+=ot(),f(i,"pointer-events:auto"),setTimeout(et,350),clearTimeout(O),N=!1,Y=!0)}function et(){if((o===T?E:o).removeAttribute("src"),document.body[y](i),i[y](o),f(i,""),f(o,""),K(!1),$){const e=i.querySelectorAll("img");for(let n=0;n<e.length;n++)i[y](e[n]);w&&i[y](b),i[y](H),$=l=!1,k={},q||i[y](R),q||i[y](X),m.onload=L,m.onerror=L.bind(null,"image")}u.onClose&&u.onClose(),Y=w=!1}function f({style:t},e){t.cssText=e}(function(){const t=document.querySelectorAll(".image-gallery a");for(let e=0;e<t.length;e++)t[e].addEventListener("click",function(n){n.preventDefault(),console.log(n.currentTarget.parentNode),lt({el:n.target,imgSrc:n.currentTarget.getAttribute("href"),gallery:".image-gallery"})})})();
