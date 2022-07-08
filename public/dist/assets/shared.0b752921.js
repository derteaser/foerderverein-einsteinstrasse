let m,oe,r,s,d,v,$,z,S,T,Q,H,y,re,b,E,N,O,j,B,q,F;const D=[];let V,Y,R,K,U,G,n,a,L,I={},W,h;const p="appendChild",c="createElement",x="removeChild";var ae=e=>(oe||le(e),y&&(clearTimeout(re),te()),h=e,H=e.ytSrc||e.vimeoSrc,Y=e.animationStart,R=e.animationEnd,K=e.onChangeImage,m=e.el,V=!1,O=m.getAttribute("data-caption"),e.gallery?ce(e.gallery,e.position):H||e.iframeSrc?(s=z,me()):e.imgSrc?(V=!0,T=e.imgSrc,!~D.indexOf(T)&&M(!0),s=d,s.src=T):e.audio?(M(!0),s=$,s.src=e.audio,J("audio file")):e.vidSrc?(M(!0),e.dimensions&&w(v,`width:${e.dimensions[0]}px`),pe(e.vidSrc),J("video")):(s=d,s.src=m.tagName==="IMG"?m.src:window.getComputedStyle(m).backgroundImage.replace(/^url|[(|)|'|"]/g,"")),r[p](s),document.body[p](r),{close:Z,opts:h,updateDimensions:ee,display:s,next:()=>k(1),prev:()=>k(-1)});function le(e){let t,o;function l(i){const u=document[c]("button");return u.className=i,u.innerHTML='<svg viewBox="0 0 48 48"><path d="M28 24L47 5a3 3 0 1 0-4-4L24 20 5 1a3 3 0 1 0-4 4l19 19L1 43a3 3 0 1 0 4 4l19-19 19 19a3 3 0 0 0 4 0v-4L28 24z"/></svg>',u}function g(i,u){const C=document[c]("button");return C.className="bp-lr",C.innerHTML='<svg viewBox="0 0 129 129" height="70" fill="#fff"><path d="M88.6 121.3c.8.8 1.8 1.2 2.9 1.2s2.1-.4 2.9-1.2a4.1 4.1 0 0 0 0-5.8l-51-51 51-51a4.1 4.1 0 0 0-5.8-5.8l-54 53.9a4.1 4.1 0 0 0 0 5.8l54 53.9z"/></svg>',w(C,u),C.onclick=ne=>{ne.stopPropagation(),k(i)},C}const f=document[c]("STYLE"),A=e&&e.overlayColor?e.overlayColor:"rgba(0,0,0,.7)";f.innerHTML=`#bp_caption,#bp_container{bottom:0;left:0;right:0;position:fixed;opacity:0}#bp_container>*,#bp_loader{position:absolute;right:0;z-index:10}#bp_container,#bp_caption,#bp_container svg{pointer-events:none}#bp_container{top:0;z-index:9999;background:${A};opacity:0;transition:opacity .35s}#bp_loader{top:0;left:0;bottom:0;display:flex;align-items:center;cursor:wait;background:0;z-index:9}#bp_loader svg{width:50%;max-width:300px;max-height:50%;margin:auto;animation:bpturn 1s infinite linear}#bp_aud,#bp_container img,#bp_sv,#bp_vid{user-select:none;max-height:96%;max-width:96%;top:0;bottom:0;left:0;margin:auto;box-shadow:0 0 3em rgba(0,0,0,.4);z-index:-1}#bp_sv{background:#111}#bp_sv svg{width:66px}#bp_caption{font-size:.9em;padding:1.3em;background:rgba(15,15,15,.94);color:#fff;text-align:center;transition:opacity .3s}#bp_aud{width:650px;top:calc(50% - 20px);bottom:auto;box-shadow:none}#bp_count{left:0;right:auto;padding:14px;color:rgba(255,255,255,.7);font-size:22px;cursor:default}#bp_container button{position:absolute;border:0;outline:0;background:0;cursor:pointer;transition:all .1s}#bp_container>.bp-x{padding:0;height:41px;width:41px;border-radius:100%;top:8px;right:14px;opacity:.8;line-height:1}#bp_container>.bp-x:focus,#bp_container>.bp-x:hover{background:rgba(255,255,255,.2)}.bp-x svg,.bp-xc svg{height:21px;width:20px;fill:#fff;vertical-align:top;}.bp-xc svg{width:16px}#bp_container .bp-xc{left:2%;bottom:100%;padding:9px 20px 7px;background:#d04444;border-radius:2px 2px 0 0;opacity:.85}#bp_container .bp-xc:focus,#bp_container .bp-xc:hover{opacity:1}.bp-lr{top:50%;top:calc(50% - 130px);padding:99px 0;width:6%;background:0;border:0;opacity:.4;transition:opacity .1s}.bp-lr:focus,.bp-lr:hover{opacity:.8}@keyframes bpf{50%{transform:translatex(15px)}100%{transform:none}}@keyframes bpl{50%{transform:translatex(-15px)}100%{transform:none}}@keyframes bpfl{0%{opacity:0;transform:translatex(70px)}100%{opacity:1;transform:none}}@keyframes bpfr{0%{opacity:0;transform:translatex(-70px)}100%{opacity:1;transform:none}}@keyframes bpfol{0%{opacity:1;transform:none}100%{opacity:0;transform:translatex(-70px)}}@keyframes bpfor{0%{opacity:1;transform:none}100%{opacity:0;transform:translatex(70px)}}@keyframes bpturn{0%{transform:none}100%{transform:rotate(360deg)}}@media (max-width:600px){.bp-lr{font-size:15vw}}`,document.head[p](f),r=document[c]("DIV"),r.id="bp_container",r.onclick=Z,Q=l("bp-x"),r[p](Q),"ontouchend"in window&&window.visualViewport&&(W=!0,r.ontouchstart=({touches:i,changedTouches:u})=>{o=i.length>1,t=u[0].pageX},r.ontouchend=({changedTouches:i})=>{if(q&&!o&&window.visualViewport.scale<=1){let u=i[0].pageX-t;u<-30&&k(1),u>30&&k(-1)}}),d=document[c]("IMG"),v=document[c]("VIDEO"),v.id="bp_vid",v.setAttribute("playsinline",!0),v.controls=!0,v.loop=!0,$=document[c]("audio"),$.id="bp_aud",$.controls=!0,$.loop=!0,L=document[c]("span"),L.id="bp_count",E=document[c]("DIV"),E.id="bp_caption",j=l("bp-xc"),j.onclick=P.bind(null,!1),E[p](j),N=document[c]("SPAN"),E[p](N),r[p](E),U=g(1,"transform:scalex(-1)"),G=g(-1,"left:0;right:auto"),b=document[c]("DIV"),b.id="bp_loader",b.innerHTML='<svg viewbox="0 0 32 32" fill="#fff" opacity=".8"><path d="M16 0a16 16 0 0 0 0 32 16 16 0 0 0 0-32m0 4a12 12 0 0 1 0 24 12 12 0 0 1 0-24" fill="#000" opacity=".5"/><path d="M16 0a16 16 0 0 1 16 16h-4A12 12 0 0 0 16 4z"/></svg>',z=document[c]("DIV"),z.id="bp_sv",S=document[c]("IFRAME"),S.setAttribute("allowfullscreen",!0),S.allow="autoplay; fullscreen",S.onload=()=>z[x](b),w(S,"border:0;position:absolute;height:100%;width:100%;left:0;top:0"),z[p](S),d.onload=_,d.onerror=_.bind(null,"image"),window.addEventListener("resize",()=>{q||y&&M(!0),s===z&&ee()}),document.addEventListener("keyup",({keyCode:i})=>{i===27&&B&&Z(),q&&(i===39&&k(1),i===37&&k(-1),i===38&&k(10),i===40&&k(-10))}),document.addEventListener("keydown",i=>{q&&~[37,38,39,40].indexOf(i.keyCode)&&i.preventDefault()}),document.addEventListener("focus",i=>{B&&!r.contains(i.target)&&(i.stopPropagation(),Q.focus())},!0),oe=!0}function se(){const{top:e,left:t,width:o,height:l}=m.getBoundingClientRect(),g=t-(r.clientWidth-o)/2,f=e-(r.clientHeight-l)/2,A=m.clientWidth/s.clientWidth,i=m.clientHeight/s.clientHeight;return`transform:translate3D(${g}px, ${f}px, 0) scale3D(${A}, ${i}, 0)`}function pe(e){Array.isArray(e)?(s=v.cloneNode(),e.forEach(t=>{const o=document[c]("SOURCE");o.src=t,o.type=`video/${t.match(/.(\w+)$/)[1]}`,s[p](o)})):(s=v,s.src=e)}function ce(e,t){let o=h.galleryAttribute||"data-bp";if(Array.isArray(e))n=t||0,a=e,O=e[n].caption;else{a=[].slice.call(typeof e=="string"?document.querySelectorAll(`${e} [${o}]`):e);const l=a.indexOf(m);n=t===0||t?t:l!==-1?l:0,a=a.map(g=>({el:g,src:g.getAttribute(o),caption:g.getAttribute("data-caption")}))}V=!0,T=a[n].src,!~D.indexOf(T)&&M(!0),a.length>1?(r[p](L),L.innerHTML=`${n+1}/${a.length}`,W||(r[p](U),r[p](G))):a=!1,s=d,s.src=T}function k(e){const t=a.length-1;if(y)return;if(e>0&&n===t||e<0&&!n){if(!h.loop){w(d,""),setTimeout(w,9,d,`animation:${e>0?"bpl":"bpf"} .3s;transition:transform .35s`);return}n=e>0?-1:t+1}if(n=Math.max(0,Math.min(n+e,t)),[n-1,n,n+1].forEach(l=>{if(l=Math.max(0,Math.min(l,t)),I[l])return;const g=a[l].src,f=document[c]("IMG");f.addEventListener("load",ie.bind(null,g)),f.src=g,I[l]=f}),I[n].complete)return X(e);y=!0,w(b,"opacity:.4;"),r[p](b),I[n].onload=()=>{q&&X(e)},I[n].onerror=()=>{a[n]={error:"Error loading image"},q&&X(e)}}function X(e){y&&(r[x](b),y=!1);const t=a[n];if(t.error)alert(t.error);else{const o=r.querySelector("img:last-of-type");d=s=I[n],w(d,`animation:${e>0?"bpfl":"bpfr"} .35s;transition:transform .35s`),w(o,`animation:${e>0?"bpfol":"bpfor"} .35s both`),r[p](d),t.el&&(m=t.el)}L.innerHTML=`${n+1}/${a.length}`,P(a[n].caption),K&&K([d,a[n]])}function me(){let e;const t="https://",o="autoplay=1";h.ytSrc?e=`${t}www.youtube${h.ytNoCookie?"-nocookie":""}.com/embed/${H}?html5=1&rel=0&playsinline=1&${o}`:h.vimeoSrc?e=`${t}player.vimeo.com/video/${H}?${o}`:h.iframeSrc&&(e=h.iframeSrc),w(b,""),z[p](b),S.src=e,ee(),setTimeout(_,9)}function ee(){let e,t;const o=window.innerHeight*.95,l=window.innerWidth*.95,g=o/l,[f,A]=h.dimensions||[1920,1080],i=A/f;i>g?(e=Math.min(A,o),t=e/i):(t=Math.min(f,l),e=t*i),z.style.cssText+=`width:${t}px;height:${e}px;`}function J(e){~[1,4].indexOf(s.readyState)?(_(),setTimeout(()=>{s.play()},99)):s.error?_(e):re=setTimeout(J,35,e)}function M(e){h.noLoader||(e&&w(b,`top:${m.offsetTop}px;left:${m.offsetLeft}px;height:${m.clientHeight}px;width:${m.clientWidth}px`),m.parentElement[e?p:x](b),y=e)}function P(e){e&&(N.innerHTML=e),w(E,`opacity:${e?"1;pointer-events:auto":"0"}`)}function ie(e){!~D.indexOf(e)&&D.push(e)}function _(e){if(y&&M(),Y&&Y(),typeof e=="string")return te(),h.onError?h.onError():alert(`Error: The requested ${e} could not be loaded.`);V&&ie(T),s.style.cssText+=se(),w(r,"opacity:1;pointer-events:auto"),R&&(R=setTimeout(R,410)),B=!0,q=!!a,setTimeout(()=>{s.style.cssText+="transition:transform .35s;transform:none",O&&setTimeout(P,250,O)},60)}function Z(e){const t=e?e.target:r,o=[E,j,v,$,N,G,U,b];t.blur(),!(F||~o.indexOf(t))&&(s.style.cssText+=se(),w(r,"pointer-events:auto"),setTimeout(te,350),clearTimeout(R),B=!1,F=!0)}function te(){if((s===z?S:s).removeAttribute("src"),document.body[x](r),r[x](s),w(r,""),w(s,""),P(!1),q){const t=r.querySelectorAll("img");for(let o=0;o<t.length;o++)r[x](t[o]);y&&r[x](b),r[x](L),q=a=!1,I={},W||r[x](U),W||r[x](G),d.onload=_,d.onerror=_.bind(null,"image")}h.onClose&&h.onClose(),F=y=!1}function w({style:e},t){e.cssText=t}(function(){const e=document.querySelectorAll(".image-gallery a");for(let t=0;t<e.length;t++)e[t].addEventListener("click",function(o){o.preventDefault(),console.log(o.currentTarget.parentNode),ae({el:o.target,imgSrc:o.currentTarget.getAttribute("href"),gallery:".image-gallery"})})})();