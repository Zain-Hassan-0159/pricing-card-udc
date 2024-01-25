<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * @since 1.0.0
 */
class Elementor_Udc_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'udc';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve udc widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Pricing Card UDC', 'hz-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'udc', 'card', 'pricing card', 'custom' ];
	}

    public function get_script_depends() {
		return [ 'udc-card' ];
	}


	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'General', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'The Power Of <span>Suvae<span>', 'hz-widgets' ),
				'placeholder' => __( 'Type your description here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'sub_heading',
			[
				'label' => esc_html__( 'Sub Heading', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "What's your monthly order volume?", 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'note',
			[
				'label' => esc_html__( 'Note', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( "Results reflect the total number of customer reviews you will receive after selling the specified number of units with vs without Suvae's Product Inserts.", 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'url_title',
			[
				'label' => esc_html__( 'URL Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Schedule Demo', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'url_link',
			[
				'label' => esc_html__( 'URL Link', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
	

		$this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Heading', 'hz-widgets' ),
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .udc_container h2',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Sub Heading', 'hz-widgets' ),
				'name' => 'subheading_typography',
				'selector' => '{{WRAPPER}} .udc_container p',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Notes', 'hz-widgets' ),
				'name' => 'note_typography',
				'selector' => '{{WRAPPER}} .udc_container .note',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Button', 'hz-widgets' ),
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .udc_container a.link',
			]
		);

        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Text Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Button Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_color_hover',
			[
				'label' => esc_html__( 'Button Text Color Hover', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'btn_bg_color_hover',
			[
				'label' => esc_html__( 'Button Color Hover', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'general_bg_color',
			[
				'label' => esc_html__( 'Container Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container' => 'background-color: {{VALUE}}',
				],
			]
		);


        $this->end_controls_section();
	}



	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();


        ?>
		<style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap');
			.udc_container{
                background: #08142DF2;
                padding: 32px;
                color: white;
                text-align: center;
            }

            .udc_container .result_cards {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-bottom: 25px;
            }

            .udc_container .card {
                background: linear-gradient(0deg, rgba(15, 60, 41, 0.4), rgba(15, 60, 41, 0.4));
                border: 1px solid #FFFFFF;
                box-shadow: 4px -20px 20px 0px #FFFFFF40 inset;
                padding: 20px;
                width: 310px;
                height: 392px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
                border-radius: 20px;
            }

            .udc_container .title {
                font-family: 'Inter', sans-serif;
                font-size: 20px;
                font-weight: 600;
                line-height: 24px;
                letter-spacing: 0em;
                text-align: center;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .udc_container .card_without_suvae .title{
                margin: 15px 0 0 0;
            }

            .udc_container .range {
                font-family: 'Inter', sans-serif;
                font-size: 30px;
                font-weight: 700;
                line-height: 65px;
                letter-spacing: 0em;
                color: white;
            }

            .udc_container h2 {
                font-family: 'Inter', sans-serif;
                font-size: 55px;
                font-weight: 700;
                line-height: 80px;
                letter-spacing: 0em;
                text-align: center;
                color: white;
            }

            .udc_container h2 span{
                color: #315BE8;
            }

            .udc_container p {
                font-family: 'Inter', sans-serif;
                font-size: 30px;
                font-weight: 600;
                line-height: 36px;
                letter-spacing: 0em;
                margin-bottom: 80px;
                color: #FFFFFFCC;
            }

            .udc_container .review {
                font-family: 'Inter', sans-serif;
                font-size: 17px;
                font-weight: 600;
                line-height: 24px;
                letter-spacing: 0em;
                text-align: center;
                color:white;
            }

            .udc_container .note {
                font-size: 22px;
                font-weight: 400;
                line-height: 27px;
                letter-spacing: 0em;
                text-align: center;
                font-family: 'Inter', sans-serif;
                padding-bottom: 45px;
                border-bottom: 1px solid #ffffff99;
                margin-bottom: 50px;
            }

            .udc_container a.link, .udc_container a.link:hover {
                background: white;
                padding: 20px 200px;
                display: inline-block;
                font-size: 22px;
                font-weight: 600;
                line-height: 30px;
                letter-spacing: 0em;
                text-align: left;
                color: #104CBA;
                font-family: 'Inter', sans-serif;
                border-radius: 8px;
                margin-bottom: 40px;
            }

            .udc_container .card.card_with_suvae.active {
                background: linear-gradient(189.61deg, #315BE8 3.23%, #1494FF 92.76%),
                linear-gradient(0deg, #FFFFFF, #FFFFFF);
            }


            .range_slider {
                width: 100%; /* Adjust width as needed */
                position: relative;
                margin-bottom: 100px;
            }

            .custom_slider {
                width: 100%;
                height: 12px;
                background-color: transparent;
                border-radius: 6px;
                border: 1px solid #104CBA;
            }

            .slide {
                position: relative;
                height: 100%;
            }

            .handle {
                position: absolute;
                top: -11px;
                left: 0;
                cursor: pointer;
                background: #104CBA;
                border: 2px solid white;
                width: 34px;
                height: 34px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
            }

            .handle svg path{
                fill: white;
            }

            svg {
                width: 22px;
                height: 12px;
            }

            #vol_slider{
                position: absolute;
            }

            .value_display {
                position: absolute;
                top: -52px;
                background: #104CBA;
                width: 75px;
                height: 36px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 8px;
            }

            .points {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .points span{
                cursor: pointer;
            }

            .points.dots span {
                width: 10px;
                height: 10px;
                display: inline-block;
                background: white;
                border-radius: 50%;
                z-index: 0;
            }

            .points.nos{
                position: absolute;
                left: 0;
                right: 0;
                bottom: -40px;
            }

            .points.nos span, .value_display{
                font-family: 'Inter', sans-serif;
                font-size: 20px;
                font-weight: 500;
                line-height: 24px;
                letter-spacing: 0em;
            }

            .points.nos span{
                color: #9699AC;
            }

            .udc_container{
                user-select: none;
            }

            .udc_container .value_display::after {
                content: " ";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -8px;
                border-width: 8px;
                border-style: solid;
                border-color: #104CBA transparent transparent transparent;
            }

            .udc_container .container{
                max-width: 1100px;
                margin: auto;
            }

            .udc_container .fill{
                height: 100%;
                position: absolute;
                width: 0%;
                background: #315BE8;
                border-radius: 6px;
            }

            @media (max-width: 680px){
                .udc_container h2{
                    font-size: 35px;
                    line-height: 35px;
                }

                .udc_container p{
                    font-size: 18px;
                    line-height: 18px;  
                }

                .points.nos span, .value_display{
                    font-size: 16px;
                    line-height: 16px;  
                }

                .udc_container .result_cards{
                    flex-direction: column;
                    align-items: center;
                }

                .udc_container a.link{
                    padding: 10px 50px;
                    font-size: 18px;
                    line-height: 18px;
                }

                .udc_container .note{
                    font-size: 18px;
                    line-height: 18px;
                }
            }
		</style>
        <div class="udc_container">
            <div class="container">
            <h2><?php echo $settings['heading']; ?></h2>
            <p><?php echo $settings['sub_heading']; ?></p>
            <div class="range_slider">
                <div class="custom_slider">
                    <div class="slide">
                        <div class="fill"></div>
                        <div class="points dots">
                            <span data-points="1000"></span>
                            <span data-points="2000"></span>
                            <span data-points="3000"></span>
                            <span data-points="4000"></span>
                            <span data-points="5000"></span>
                        </div>
                        <div class="points nos">
                            <span data-points="1000">1000</span>
                            <span data-points="2000">2000</span>
                            <span data-points="3000">3000</span>
                            <span data-points="4000">4000</span>
                            <span data-points="5000">5000+</span>
                        </div>
                        <div class="handle">
                            <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.1983 5.70336L14.5 2.00502L16.145 0.348358L21.5 5.70336L16.145 11.0467L14.5 9.40169L18.1983 5.70336ZM3.80167 5.70336L7.5 9.40169L5.855 11.0584L0.5 5.70336L5.855 0.360025L7.5 2.00502L3.80167 5.70336Z" fill="black"/>
                            </svg>
                            <div class="value_display">1000</div>
                        </div>
                    </div>
                </div>
                <input style="display: none;" id="vol_slider" type="range" min="1000" max="5000" step="50">
            </div>
            <div class="result_cards">
                <div class="card card_with_suvae active">
                    <div class="title">
                        <span>With</span>
                        <img src="<?php echo UDC_PLUGIN_ASSETS_FILE . '/images/suvae.png'; ?>" alt="suvae logo">
                    </div>
                    <img src="<?php echo UDC_PLUGIN_ASSETS_FILE . '/images/happy.png'; ?>" alt="happy">
                    <div class="reviewss">
                        <div class="range">
                            130-170
                        </div>
                        <div class="review">Customer Reviews</div>
                    </div>
                </div>
                <div class="card card_without_suvae">
                    <div class="title">
                        <span>Without Suvae</span>
                    </div>
                    <img src="<?php echo UDC_PLUGIN_ASSETS_FILE . '/images/sad.png'; ?>" alt="happy">
                    <div class="reviewss">
                        <div class="range">
                            10-40
                        </div>
                        <div class="review">Customer Reviews</div>
                    </div>
                </div>
            </div>
            <div class="note" ><?php echo $settings['note']; ?></div>
            <?php
                if ( ! empty( $settings['url_link']['url'] ) ) {
                    $this->add_link_attributes( 'url_link', $settings['url_link'] );
                }
            ?>
            <a class="link" <?php echo $this->get_render_attribute_string( 'url_link' ); ?>><?php echo $settings['url_title']; ?></a>
            </div>
        </div>

        <?php     if ( \Elementor\Plugin::$instance->editor->is_edit_mode()) : ?>
			<script>
                jQuery(document).ready(function ($) {
                    var slider = $('#vol_slider');
                    var handle = $('.handle');
                    var slide = $('.slide');
                    var min = parseInt(slider.attr('min'));
                    var max = parseInt(slider.attr('max'));
                    var points = $(".points span");
                    
                    // Update handle position on slider input
                    slider.on('input', function() {
                        var value = $(this).val();
                        console.log(value)
                        if(value > max - 5){
                            value = max;
                        }else if(value < min + 5){
                            value = min;
                        }

                        $('.value_display').text(value); // Update value display
                        var percent = (value - min) / (max - min) * 100;
                        var position = (slide.width() * percent) / 100;
                        handle.css('left', position - 20 + 'px');
                        $('.udc_container .fill').css('width', position + 'px');

                        // update suvae value
                        const min_sua = Math.floor((6.5/100) * value);
                        const max_sua = Math.floor((8/100) * value);

                        const min_sua_out = Math.floor((0.5/100) * value);
                        const max_sua_out = Math.floor((2/100) * value);

                        $('.udc_container .card_with_suvae .range').text(min_sua + '-' + max_sua)
                        $('.udc_container .card_without_suvae .range').text(min_sua_out + '-' + max_sua_out)


                    });
                    
                    // Update slider value on handle drag
                    handle.on('mousedown touchstart', function(e) {
                        var offsetX;
                        if (e.type === 'mousedown') {
                            offsetX = e.pageX - handle.offset().left;
                        } else if (e.type === 'touchstart') {
                            var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
                            offsetX = touch.pageX - handle.offset().left;
                        }

                        $(document).on('mousemove.slider touchmove.slider', function(e) {
                            var leftValue;
                            if (e.type === 'mousemove') {
                                leftValue = e.pageX - slide.offset().left - offsetX;
                            } else if (e.type === 'touchmove') {
                                var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
                                leftValue = touch.pageX - slide.offset().left - offsetX;
                            }

                            var percent = (leftValue / slide.width()) * 100;
                            if (percent >= 0 && percent <= 100) {
                                var value = Math.round((percent / 100) * (max - min) + min);
                                value = Math.min(max, Math.max(min, value)); // Ensure value stays within bounds
                                var position = ((value - min) / (max - min)) * 100;
                                handle.css('left', position + '%');
                                slider.val(value).trigger('input');
                            }
                        });

                        $(document).on('mouseup.slider touchend.slider', function() {
                            $(document).off('.slider'); // Unbind all events related to slider
                        });
                    });

                    
                    
                    // Move handle on click
                    slide.on('click', function(e) {
                        var offset = e.pageX - slide.offset().left;
                        var percent = (offset / slide.width()) * 100;
                        var value = Math.round((percent / 100) * (max - min) + min);
                        value = Math.min(max, Math.max(min, value)); // Ensure value stays within bounds
                        handle.css('left', percent + '%');
                        slider.val(value).trigger('input');
                    });
                
                });
            </script>
        <?php  endif; ?>
		<?php
	}

}