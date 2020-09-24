<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   <div class="heading">
                    <!-- <h1>Play Sound</h1> -->
                    </div>

                    <div class="container" id="app">
<!--                     
                    <div class="form-group">
                        <label>
                        <button class="btn btn-primary btn-sm" @click.prevent="playSound('../uploads/1.mp3')"><span class="fa fa-play-circle-o"></span></button>
                        Play Air Plane Ding
                        </label>
                        <br>
                        <label>
                        <button class="btn btn-primary btn-sm" @click.prevent="playSound('../uploads/2.mp3')"><span class="fa fa-play-circle-o"></span></button>
                        Play Elevator Ding
                        </label>
                    </div> -->
                    <div class="container">
                     <ul id="example-1">
                      <li v-for="item in ar" :key="item.name">
                        {{ item.name }}
                      </li>
                    </ul>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       props: ['datas'],

        data: function() {
          return {
            ar: JSON.parse(this.array)
          }
        },
        methods: { 
            playSound (sound) {
                if(sound) {
                    var audio = new Audio(sound);
                    audio.play();
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
.heading {
  text-align: center;
  h1 {
    background: -webkit-linear-gradient(#fff, #999);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    text-align: center;
    margin: 0 0 5px 0;
    font-weight: 900;
    font-size: 4rem;
    color: #fff;
  }
  h4 {
    color: lighten(#5c3d86,30%);
    text-align: center;
    margin: 0 0 35px 0;
    font-weight: 400;
    font-size: 24px;
  }
}
.btn{
  outline: none !important;
}
.btn.btn-primary {
  background-color: $purple;
  border-color: $purple;
  outline: none;
  &:hover {
    background-color: darken($purple, 10%);
    border-color: darken($purple, 10%);
  }
  &:active, &:focus {
    background-color: lighten($purple, 5%);
    border-color: lighten($purple, 5%);
  }
  & .fa {
    padding-right: 4px;
  }
}
.btn-sm {
  font-size: 22px;
  padding: 2px 1px 2px 4px;
  line-height: 12px;
  margin-right: 10px;
}
.form-group {
  margin-bottom: 25px;
}

</style>