<!-- 화면에 포스트랑 글 작성용이 호출 되어있지만,
    실질적으론 flg가 0일 때 포스트를 보여주고
    flg가 1일 때 포스트를 숨기고 대신 글 작성용 페이지가 띄워짐 -->
<template>
    <!-- 포스트 호출 -->
    <div v-if="$store.state.flgTabUI === 0">
        <PostComponent></PostComponent>
    </div>
    <!-- 글 작성용 -->
    <div v-if="$store.state.flgTabUI === 1">
        <div 
            class="upload-img"
            :style="{backgroundImage : `url('${$store.state.imgURL}')`}"></div>
        <div>
            <textarea 
                class="write-box"
                name="content" 
                id="content"
                placeholder="글을 작성해 주세요."></textarea>
        </div>
    </div>
</template>
<script>
import PostComponent from './PostComponent.vue';
export default {
    name: 'ContainerComponent',
    components: {
        PostComponent,
    }
}
</script>
<style>
    
</style>