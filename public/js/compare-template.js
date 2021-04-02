$(document).ready(function () {

    // Ram
    let ram_memory_1 = parseInt($('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(3).text())
    let ram_memory_2 = parseInt($('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(3).text())
    let ram_memory_3 = parseInt($('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(3).text())

    if (ram_memory_1 > ram_memory_2 && ram_memory_1 > ram_memory_3) {
        $('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(3).addClass('highlight')
    }

    if (ram_memory_2 > ram_memory_1 && ram_memory_2 > ram_memory_3) {
        $('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(3).addClass('highlight')
    }

    if (ram_memory_3 > ram_memory_1 && ram_memory_3 > ram_memory_2) {
        $('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(3).addClass('highlight')
    }

    // Cpu score
    let cpu_score_1 = parseInt($('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(7).text())
    let cpu_score_2 = parseInt($('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(7).text())
    let cpu_score_3 = parseInt($('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(7).text())

    if (cpu_score_1 > cpu_score_2 && cpu_score_1 > cpu_score_3) {
        $('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(7).addClass('highlight')
    }

    if (cpu_score_2 > cpu_score_1 && cpu_score_2 > cpu_score_3) {
        $('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(7).addClass('highlight')
    }

    if (cpu_score_3 > cpu_score_1 && cpu_score_3 > cpu_score_2) {
        $('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(7).addClass('highlight')
    }

    // Gpu score
    let gpu_score_1 = parseInt($('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(11).text())
    let gpu_score_2 = parseInt($('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(11).text())
    let gpu_score_3 = parseInt($('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(11).text())

    if (gpu_score_1 > gpu_score_2 && gpu_score_1 > gpu_score_3) {
        $('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(11).addClass('highlight')
    }

    if (gpu_score_2 > gpu_score_1 && gpu_score_2 > gpu_score_3) {
        $('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(11).addClass('highlight')
    }

    if (gpu_score_3 > gpu_score_1 && gpu_score_3 > gpu_score_2) {
        $('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(11).addClass('highlight')
    }

    // Battery life
    let battery_1 = parseInt($('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(12).text())
    let battery_2 = parseInt($('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(12).text())
    let battery_3 = parseInt($('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(12).text())

    if (battery_1 > battery_2 && battery_1 > battery_3) {
        $('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(12).addClass('highlight')
    }

    if (battery_2 > battery_1 && battery_2 > battery_3) {
        $('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(12).addClass('highlight')
    }

    if (battery_3 > battery_1 && battery_3 > battery_2) {
        $('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(12).addClass('highlight')
    }

    // Max temp
    let max_temp_1 = parseInt($('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(14).text())
    let max_temp_2 = parseInt($('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(14).text())
    let max_temp_3 = parseInt($('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(14).text())

    if (max_temp_1 < max_temp_2 && max_temp_1 < max_temp_3) {
        $('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(14).addClass('highlight')
    }

    if (max_temp_2 < max_temp_1 && max_temp_2 < max_temp_3) {
        $('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(14).addClass('highlight')
    }

    if (max_temp_3 < max_temp_1 && max_temp_3 < max_temp_2) {
        $('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(14).addClass('highlight')
    }

    // Max noise
    let max_noise_1 = parseInt($('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(15).text())
    let max_noise_2 = parseInt($('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(15).text())
    let max_noise_3 = parseInt($('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(15).text())

    if (max_noise_1 < max_noise_2 && max_noise_1 < max_noise_3) {
        $('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(15).addClass('highlight')
    }

    if (max_noise_2 < max_noise_1 && max_noise_2 < max_noise_3) {
        $('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(15).addClass('highlight')
    }

    if (max_noise_3 < max_noise_1 && max_noise_3 < max_noise_2) {
        $('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(15).addClass('highlight')
    }

    // Price
    let price_1 = parseInt($('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(16).text())
    let price_2 = parseInt($('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(16).text())
    let price_3 = parseInt($('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(16).text())

    if (price_1 < price_2 && price_1 < price_3) {
        $('.compare-specs').children('.compare-specs-box').eq(1).find('li').eq(16).addClass('highlight')
    }

    if (price_2 < price_1 && price_2 < price_3) {
        $('.compare-specs').children('.compare-specs-box').eq(2).find('li').eq(16).addClass('highlight')
    }

    if (price_3 < price_1 && price_3 < price_2) {
        $('.compare-specs').children('.compare-specs-box').eq(3).find('li').eq(16).addClass('highlight')
    }


})
