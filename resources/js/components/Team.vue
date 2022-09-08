<template>
    <section id="tim" class="team">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p>Ini Adalah Beberapa Anggota Dari Tim Kami</p>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" v-for="team in teams" :key="team.id">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                  <img
                    src="assets/img/team/team-1.jpg"
                    class="img-fluid"
                    alt=""
                  />
                </div>
                <div class="member-info">
                  <h4>{{ team.team_nama }}</h4>
                  <span>{{ team.team_jabatan }}</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
</template>

<script>
    export default {
        name: "TeamComponents",
        data() {
            return {
                teams: []
            }
        },
        created() {
            this.getTeam();
        },
        methods: {
            async getTeam() {
                try {
                    const response = await axios.get("team");
                    this.teams = response.data;
                } catch (error) {
                    console.log("Oopss.. Terjadi Kesalahan");
                }
            }
        }
    }
</script>
