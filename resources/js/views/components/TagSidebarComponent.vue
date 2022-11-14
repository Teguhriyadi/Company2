<template>
    <div class="sidebar-item tags">
        <h3 class="sidebar-title">Tags</h3>
        <ul class="mt-3">
            <li v-for="(tag, index) in dataTag" :key="index">
                <router-link to="/">
                    {{ tag.tag_nama }}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Tag",
        data() {
            return {
                dataTag: []
            }
        },
        created() {
            this.getTag();
        },
        methods: {
            async getTag() {
                try {
                    const response = await axios.get("tag");
                    this.dataTag = response.data.data;
                } catch (error) {
                    console.log("Oopss.. Error");
                }
            }
        }
    }
</script>
