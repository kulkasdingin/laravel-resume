<template>
<body>

	<!-- Introduction -->
	<div class="intro section" id="about">
		<div class="container">
			<p>Hi!, i'm a {{ cv.profession }}</p>
			<div class="units-row units-split wrap">
				<div class="unit-1000">
					<h1>{{ cv.first_name }}</h1>
				</div>
				<p>
					Draco is a constellation in the far northern sky. Its name is Latin for dragon. Draco is circumpolar (that is, never setting) for many observers in the northern hemisphere. It was one of the 48 constellations listed by the 2nd century astronomer Ptolemy.
				</p>
			</div>
		</div>
	</div>
	<!-- Award & Achievements -->
	<div class="award section second" id="achievements">
		<div class="container">
			<h1>Award &amp;<br>Achievements</h1>
			<ul class="award-list list-flat">
				<li>January 2014</li>
				<li>Attained PHP5 certification</li>
				<li>Hold world/Olympic record</li>
			</ul>
			<ul class="award-list list-flat">
				<li>December 2014</li>
				<li>Audited X number of clients in only Y amount of time</li>
				<li>Held a perfect attendance record</li>
				<li>Were promoted after only X months in the role</li>
			</ul>
			<ul class="award-list list-flat">
				<li>March 2014</li>
				<li>Placed employees at X companies</li>
				<li>United multiple teams post-merger</li>
			</ul>
		</div>
	</div>

	<!-- Technical Skills -->
	<div class="skills section second" id="skills">
		<div class="container">
			<h1>Technical<br>Skills</h1>
			<ul class="skill-list list-flat">
				<li>Web Technology</li>
				<li>HTML / CSS / SASS / PHP / Javascript</li>
			</ul>
			<ul class="skill-list list-flat">
				<li>Database</li>
				<li>MySQL / MongoDB / Oracle / Access</li>
			</ul>
			<ul class="skill-list list-flat">
				<li>Framework</li>
				<li>Laravel / CodeIgniter / Zend / Ruby On Rails</li>
			</ul>
		</div>
	</div>


	<footer>
		<div class="container">
			<div class="units-row">
			    <div class="unit-50">
			    	<p>Handcrafted by Afnizar Nur Ghifari</p>
			    </div>
			    <div class="unit-50">
					<ul class="social list-flat right">
						<li><a href="mailto:afnizarhilmi@gmail.com"><i class="fa fa-send"></i></a></li>
						<li><a href="http://twitter.com/afnizarnur"><i class="fa fa-twitter"></i></a></li>
						<li><a href="http://dribbble.com/afnizarnur"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="http://behance.com/afnizarnur"><i class="fa fa-behance"></i></a></li>
					</ul>
			    </div>
			</div>
		</div>
	</footer>

</body>
</template>

<script>
    export default {
        data(){
            return{
				cv: {},
				cvDataLoaded: false,
                uri: '/admin/resource/cvs'
            }
        },
        methods: {
            cvInit(){
            },
            putAsyncData(data){
				this.cv = data;
				this.cvDataLoaded = true;
            },
            loadData(){
				var id = window.location.href.split('/').pop();
                axios.get(this.uri + "/" + id)
                .then(response=>{
                    let self = this
                    $.when(this.putAsyncData(response.data.cv)).then(function(){
						self.cvInit();
						console.log(response.data.cv)
                    });
                });
            },
        },
        mounted() {
            this.loadData();
			console.log('Component mounted.');
        }
    }
</script>
