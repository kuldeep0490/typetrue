<template>
    <section id="clouds">
        <div class="cloud cloud1">
            <svg width="120px" height="70px" viewBox="0 0 120 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M95,20 C91.379,20 87.941,20.776 84.835,22.161 C83.425,9.691 72.847,0 60,0 C47.153,0 36.575,9.691 35.165,22.161 C32.059,20.776 28.621,20 25,20 C11.193,20 0,31.193 0,45 C0,58.133 10.129,68.894 23,69.913 L23,70 L95,70 C108.807,70 120,58.807 120,45 C120,31.193 108.807,20 95,20" id="cloud" fill="#FFFFFF"></path>
                </g>
            </svg>
        </div>
        <div class="cloud cloud2">
            <svg width="120px" height="70px" viewBox="0 0 120 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M95,20 C91.379,20 87.941,20.776 84.835,22.161 C83.425,9.691 72.847,0 60,0 C47.153,0 36.575,9.691 35.165,22.161 C32.059,20.776 28.621,20 25,20 C11.193,20 0,31.193 0,45 C0,58.133 10.129,68.894 23,69.913 L23,70 L95,70 C108.807,70 120,58.807 120,45 C120,31.193 108.807,20 95,20" id="cloud" fill="#FFFFFF"></path>
                </g>
            </svg>
        </div>
        <div class="cloud cloud3">
            <svg width="120px" height="70px" viewBox="0 0 120 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M95,20 C91.379,20 87.941,20.776 84.835,22.161 C83.425,9.691 72.847,0 60,0 C47.153,0 36.575,9.691 35.165,22.161 C32.059,20.776 28.621,20 25,20 C11.193,20 0,31.193 0,45 C0,58.133 10.129,68.894 23,69.913 L23,70 L95,70 C108.807,70 120,58.807 120,45 C120,31.193 108.807,20 95,20" id="cloud" fill="#FFFFFF"></path>
                </g>
            </svg>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #clouds {
        position: absolute;
        width: 100%;
        height: 100vh;
        
        .cloud {
		    display: inline-block;
		    position: absolute;
		    z-index: 1;
	    }
    }
</style>


<script>
    import { TimelineLite, TimelineMax } from "gsap/TweenMax";

    export default {
        mounted() {
            let allClouds = new TimelineLite();

            for(let i = 1; i < 6; i ++) {
                let cloud = $('.cloud' + i);
                
                TweenLite.set(cloud, { left: Math.random(), top: i * 150, opacity: 0 });

                let cloudTl = new TimelineMax({ repeat: -1 });

                cloudTl.to(cloud, 0.5, { opacity: 1 })
                    .to(cloud, 6 + (Math.random() * 50), { left: "100%", ease: Linear.easeNone }, 0)
                    .to(cloud, 0.5, { opacity:0 }, "-=0.5")

                allClouds.add(cloudTl, Math.random() * 5);
            }
        }
    }
</script>

