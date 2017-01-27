<div class="page-header">
  <h1>
    <?php if(is_singular()&&!is_page()&&!is_singular('anggota')): _e('Slote Tv NEWS', 'warna'); echo '<small>' . roots_title() . '</small>'; elseif(is_post_type_archive('anggota')||is_singular('anggota')): echo 'Member Takeshi' ;elseif(is_tax('gender')) :echo 'Member' ;  else : echo roots_title(); endif ;?>
  </h1>
</div>
