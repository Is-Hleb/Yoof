const axios = require('axios')

export default class UploadAdapter {
    constructor( loader, id, token ) {
        // The file loader instance to use during the upload.
        this.loader = loader
        this.token = token
        this.id = id

    }

    upload() {
        return this.loader.file
            .then( uploadedFile => {
                return new Promise( ( resolve, reject ) => {
                    const data = new FormData();
                    data.append( 'upload', uploadedFile );
                    data.append('id', this.id);
                    axios( {
                        url: '/api/admin/article/upload-image',
                        method: 'post',
                        data,
                        headers: {
                            'Content-Type': 'multipart/form-data;',
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + this.token,
                        },
                        withCredentials: false
                    } ).then( response => {
                        if ( response.data.code === 'success' ) {
                            console.log(response.data)
                            resolve( {
                                default: response.data.data
                            } );
                        } else {
                            reject( response.data.message );
                        }
                    } ).catch( response => {
                        reject( 'Upload failed' + response.data );
                    } );

                } );
            } );
    }


    // Aborts the upload process.
    abort() {
       console.log('aborded')
    }


}
