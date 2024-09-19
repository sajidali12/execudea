import{r as l,j as e,Y as r}from"./app-e853b0d8.js";import{G as o}from"./GuestLayout-a70d975c.js";import"./ApplicationLogo-bb4b50be.js";function x({post:t}){return l.useEffect(()=>{const i=document.getElementById("blog-content"),a=new IntersectionObserver(n=>{n.forEach(s=>{s.isIntersecting&&s.target.classList.add("fade-in")})},{threshold:.1});return a.observe(i),()=>{a.disconnect()}},[]),e.jsxs(e.Fragment,{children:[e.jsx(r,{title:t.title}),e.jsx(o,{children:e.jsxs("section",{className:"bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative overflow-hidden",children:[e.jsxs("div",{className:"container md:px-10 px-4 flex flex-col lg:flex-row items-center justify-between",children:[t.image&&e.jsx("div",{className:"lg:w-2/5 animate-image-float",children:e.jsx("img",{src:`/storage/product/image/${t.image}`,alt:t.title,className:"rounded-lg shadow-lg max-w-full h-auto"})}),e.jsxs("div",{className:"lg:w-3/5 lg:pl-10 mt-8 lg:mt-0",children:[e.jsx("h1",{className:"text-4xl font-bold text-gray-800 mb-4 transform transition duration-500 hover:scale-105",children:t.title}),e.jsx("span",{className:"bg-primary text-white px-1 py-1",children:"Author: Syed Sajid Ali"}),e.jsxs("p",{className:"mt-2",children:[" ",new Date(t.created_at).toLocaleDateString("en-US",{day:"2-digit",month:"long",year:"numeric"})]})]})]}),e.jsx("div",{class:"container m-auto md:px-10 px-4 lg:py-8 py-8",children:e.jsx("div",{id:"blog-content",className:"text-md text-slate-500 opacity-0 transition-opacity duration-500",dangerouslySetInnerHTML:{__html:t.body}})}),e.jsx("div",{className:"absolute -bottom-1 w-full",children:e.jsx("svg",{className:"w-full h-full",viewBox:"0 0 1440 40",xmlns:"http://www.w3.org/2000/svg",children:e.jsx("g",{fill:"#fff",children:e.jsx("path",{d:"M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"})})})})]})}),e.jsx("style",{jsx:!0,children:`
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
