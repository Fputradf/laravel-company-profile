node {
    checkout scm
    // Tahap Build
    stage ("Build") {
        // Ganti image ke versi yang mendukung PHP 8.2
        docker.image('composer:latest').inside('-u root') {
            sh 'rm -f composer.lock'
            sh 'composer install --ignore-platform-reqs' 
        }
    }
    // Tahap Testing
    stage ("Testing") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'php -v'
            sh 'echo "PHP version check success"'
        }
    }
}
    // Tahap Deploy ke Produksi
    stage ("Deploy") {
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-prod']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$PROD_HOST" > ~/.ssh/known_hosts'
                sh "rsync -rav --delete ./ ubuntu@$PROD_HOST:/home/ubuntu/prod.kelasdevops.xyz/ --exclude=.env --exclude=storage --exclude=.git"
            }
        }
    }
}