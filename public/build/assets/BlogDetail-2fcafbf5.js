import{r as l,j as t,Y as r}from"./app-e285a053.js";import{G as o}from"./GuestLayout-164071d3.js";import"./ApplicationLogo-c58b6193.js";function x({post:e}){return l.useEffect(()=>{const i=document.getElementById("blog-content"),a=new IntersectionObserver(n=>{n.forEach(s=>{s.isIntersecting&&s.target.classList.add("fade-in")})},{threshold:.1});return a.observe(i),()=>{a.disconnect()}},[]),t.jsxs(t.Fragment,{children:[t.jsx(r,{title:e.title}),t.jsx(o,{children:t.jsxs("section",{className:"bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative overflow-hidden",children:[t.jsxs("div",{className:"container md:px-10 px-4 flex flex-col lg:flex-row items-center justify-between",children:[e.image&&t.jsx("div",{className:"lg:w-1/2 animate-image-float",children:t.jsx("img",{src:`/storage/product/image/${e.image}`,alt:e.title,className:"rounded-lg shadow-lg max-w-full h-auto"})}),t.jsxs("div",{className:"lg:w-1/2 lg:pl-10 mt-8 lg:mt-0",children:[t.jsx("h1",{className:"text-4xl font-bold text-gray-800 mb-4 transform transition duration-500 hover:scale-105",children:e.title}),t.jsx("div",{id:"blog-content",className:"text-xl text-gray-600 opacity-0 transition-opacity duration-500",dangerouslySetInnerHTML:{__html:e.body}})]})]}),t.jsx("div",{className:"absolute -bottom-1 w-full",children:t.jsx("svg",{className:"w-full h-full",viewBox:"0 0 1440 40",xmlns:"http://www.w3.org/2000/svg",children:t.jsx("g",{fill:"#fff",children:t.jsx("path",{d:"M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"})})})})]})}),t.jsx("style",{jsx:!0,children:`
                @keyframes image-float {
                    0% {
                        transform: translateY(0);
                    }
                    50% {
                        transform: translateY(-10px);
                    }
                    100% {
                        transform: translateY(0);
                    }
                }
                .animate-image-float {
                    animation: image-float 3s ease-in-out infinite;
                }

                .fade-in {
                    opacity: 1 !important;
                    transition: opacity 1s ease-in-out;
                }

                #blog-content {
                    opacity: 0;
                    transition: opacity 1s ease-in-out;
                }
            `})]})}export{x as default};
